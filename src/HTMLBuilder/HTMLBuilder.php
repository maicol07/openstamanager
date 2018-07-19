<?php

namespace HTMLBuilder;

/**
 * Classe dedicata alla gestione della conversione di tag in codice HTML.
 *
 * <b>Tag di input</b>
 *
 * Campo di input generico:
 * {[ "type": "text", "required": 1, "value": "$idintervento$" ]}
 *
 * Campo di testo normale e non modificabile:
 * {[ "type": "span", "value": "$testo$" ]}
 *
 * Campo select automatizzatp:
 * {[ "type": "select", "required": 1, "values": "query=SELECT id, descrizione FROM co_contratti WHERE idanagrafica=$idanagrafica$", "value": "$idcontratto$" ]}
 *
 * La sostituzione dei parametri compresi tra $$ viene effettuata attraverso il parametro $records.
 *
 * <b>Tag personalizzati</b>
 *
 * Struttura per l'inserimento e la visualizzazione dei file:
 * {( "name": "filelist_and_upload", "id_module": "3", "id_record": "17" )}
 *
 * @since 2.3
 */
class HTMLBuilder
{
    /** @var array Codici di apertura dei tag personalizzati */
    public $open = [
        'handler' => '{[',
        'manager' => '{(',
    ];

    /** @var array Codici di chiusura dei tag personalizzati */
    public $close = [
        'handler' => ']}',
        'manager' => ')}',
    ];

    /** @var array Elenco degli attributi che necessitano esclusivamente di essere presenti */
    protected $specifics = [
        'multiple',
        'checked',
        'disabled',
        'readonly',
        'required',
    ];

    /** @var array Elenco dei gestori dei campi HTML */
    protected $handlers = [
        'list' => [
            'default' => 'HTMLBuilder\Handler\DefaultHandler',
            'image' => 'HTMLBuilder\Handler\MediaHandler',
            'select' => 'HTMLBuilder\Handler\SelectHandler',
            'checkbox' => 'HTMLBuilder\Handler\ChoicesHandler',
            'radio' => 'HTMLBuilder\Handler\ChoicesHandler',
            'bootswitch' => 'HTMLBuilder\Handler\ChoicesHandler',
            'timestamp' => 'HTMLBuilder\Handler\DateHandler',
            'date' => 'HTMLBuilder\Handler\DateHandler',
            'time' => 'HTMLBuilder\Handler\DateHandler',
        ],
        'instances' => [],
    ];

    /** @var array Generatore del contenitore per i campi HTML */
    protected $wrapper = [
        'class' => 'HTMLBuilder\Wrapper\HTMLWrapper',
        'istance' => null,
    ];

    /** @var array Elenco dei gestori delle strutture HTML */
    protected $managers = [
        'list' => [
            'filelist_and_upload' => 'HTMLBuilder\Manager\FileManager',
            'button' => 'HTMLBuilder\Manager\ButtonManager',
            'csrf' => 'HTMLBuilder\Manager\CSRFManager',
            'custom_fields' => 'HTMLBuilder\Manager\FieldManager',
            'widgets' => 'HTMLBuilder\Manager\WidgetManager',
        ],
        'instances' => [],
    ];

    /** @var int Limite di ricorsione interna */
    protected $max_recursion = 10;

    /** @var array Elenco degli elementi abilitati per la sostituzione automatica nei valori ($nome$) */
    protected $record = [];

    /**
     * Esegue la sostituzione dei tag personalizzati con il relativo codice HTML.
     *
     * @param string $html
     *
     * @return string
     */
    public function replace($html, $depth = 0)
    {
        // Gestione dei manager generici
        preg_match_all('/'.preg_quote($this->open['manager']).'(.+?)'.preg_quote($this->close['manager']).'/is', $html, $managers);

        foreach ($managers[0] as $value) {
            $json = $this->decode($value, 'manager');
            $class = $this->getManager($json['name']);

            $result = !empty($class) ? $class->manage($json) : '';

            // Ricorsione
            if ($depth < $this->max_recursion) {
                $result = $this->replace($result, $depth + 1);
            }

            $html = str_replace($value, !empty($result) ? $result : $value, $html);
        }

        // Gestione del formato di input HTML semplificato
        preg_match_all('/'.preg_quote($this->open['handler']).'(.+?)'.preg_quote($this->close['handler']).'/is', $html, $handlers);

        foreach ($handlers[0] as $value) {
            $json = $this->decode($value, 'handler');
            $result = $this->generate($json);

            // Ricorsione
            if ($depth < $this->max_recursion) {
                $result = $this->replace($result, $depth + 1);
            }

            $html = str_replace($value, !empty($result) ? $result : $value, $html);
        }

        return $html;
    }

    /**
     * Genera il codice HTML per i singoli tag di input.
     *
     * @param string $json
     *
     * @return string
     */
    protected function generate($json)
    {
        // Elaborazione del formato
        $elaboration = $this->elaborate($json);
        $values = $elaboration[0];
        $extras = $elaboration[1];

        $result = null;
        if (!empty($values)) {
            // Generazione dell'elemento
            $html = $this->getHandler($values['type'])->handle($values, $extras);

            // Generazione del parte iniziale del contenitore
            $before = $this->getWrapper()->before($values, $extras);

            // Generazione del parte finale del contenitore
            $after = $this->getWrapper()->after($values, $extras);

            $result = $before.$html.$after;

            // Elaborazione del codice HTML
            $result = $this->process($result, $values, $extras);
        }

        return $result;
    }

    /**
     * Decodifica i tag personalizzati e li converte in un array basato sul formato JSON.
     *
     * @param string $string
     * @param string $type
     *
     * @return array
     */
    protected function decode($string, $type)
    {
        $string = '{'.substr($string, strlen($this->open[$type]), -strlen($this->close[$type])).'}';

        // Fix per contenuti con newline integrati
        $string = str_replace(["\n", "\r"], ['\\n', '\\r'], $string);

        $json = (array) json_decode($string, true);

        return $json;
    }

    /**
     * Elabora l'array contenente le impostazioni del tag per renderlo fruibile alla conversione in HTML (per i tag di input).
     *
     * @param array $json
     *
     * @return array
     */
    protected function elaborate($json)
    {
        $values = [];
        $extras = [];

        if (!empty($json)) {
            // Conversione delle variabili con i campi di database ($record)
            foreach ($json as $key => $value) {
                if (empty($value) && !is_numeric($value)) {
                    unset($json[$key]);
                }
                // Sostituzione delle variabili $nome$ col relativo valore da database
                elseif (is_string($json[$key]) && preg_match_all('/\$([a-z0-9\_]+)\$/i', $json[$key], $m)) {
                    for ($i = 0; $i < count($m[0]); ++$i) {
                        $record = isset($this->record[$m[1][$i]]) ? $this->record[$m[1][$i]] : '';
                        $json[$key] = str_replace($m[0][$i], prepareToField($record), $json[$key]);
                    }
                }
            }

            // Valori speciali che richiedono solo la propria presenza
            foreach ($this->specifics as $specific) {
                if (isset($json[$specific])) {
                    if (!empty($json[$specific])) {
                        $extras[] = trim($specific);
                    }
                    unset($json[$specific]);
                }
            }

            // Campo personalizzato "extra"
            if (isset($json['extra'])) {
                if (!empty($json['extra'])) {
                    $extras[] = trim($json['extra']);
                }
                unset($json['extra']);
            }

            // Attributi normali
            foreach ($json as $key => $value) {
                $values[trim($key)] = is_string($value) ? trim($value) : $value;
            }

            // Valori particolari
            $values['name'] = str_replace(' ', '_', $values['name']);
            $values['id'] = empty($values['id']) ? $values['name'] : $values['id'];
            $values['id'] = str_replace(['[', ']', ' '], ['', '', '_'], $values['id']);
            $values['value'] = isset($values['value']) ? $values['value'] : '';

            // Gestione delle classi CSS
            $values['class'] = [];
            $values['class'][] = 'form-control';
            if (!empty($json['class'])) {
                $classes = explode(' ', $json['class']);
                foreach ($classes as $class) {
                    if (!empty($class)) {
                        $values['class'][] = trim($class);
                    }
                }
            }

            // Gestione grafica dell'attributo required
            if (in_array('required', $extras)) {
                if (!empty($values['label'])) {
                    $values['label'] .= '*';
                } elseif (!empty($values['placeholder'])) {
                    $values['placeholder'] .= '*';
                }
            }
        }

        return [$values, $extras];
    }

    /**
     * Sostituisce i placeholder delle impostazioni con i relativi valori (per i tag di input).
     *
     * @param string $result
     * @param array  $values
     * @param array  $extras
     *
     * @return string
     */
    protected function process($result, $values, $extras)
    {
        unset($values['label']);

        $values['class'] = array_unique($values['class']);

        foreach ($values as $key => $value) {
            // Fix per la presenza di apici doppi
            $value = prepareToField(is_array($value) ? implode(' ', $value) : $value);
            if (str_contains($result, '|'.$key.'|')) {
                $result = str_replace('|'.$key.'|', $value, $result);
            } elseif (!empty($value) || is_numeric($value)) {
                $attributes[] = $key.'="'.$value.'"';
            }
        }

        $attributes = array_unique(array_merge($attributes, $extras));

        $result = str_replace('|attr|', implode(' ', $attributes), $result);

        return $result;
    }

    /**
     * Restituisce il nome della classe resposabile per la gestione di una determinata tipologia di tag di input.
     *
     * @param string $input
     *
     * @return string
     */
    public function getHandlerName($input)
    {
        $result = empty($this->handlers['list'][$input]) ? $this->handlers['list']['default'] : $this->handlers['list'][$input];

        return $result;
    }

    /**
     * Restituisce l'istanza della classe resposabile per la gestione di una determinata tipologia di tag di input.
     *
     * @param string $input
     *
     * @return mixed
     */
    public function getHandler($input)
    {
        $class = $this->getHandlerName($input);
        if (empty($this->handlers['instances'][$class])) {
            $this->handlers['instances'][$class] = new $class();
        }

        return $this->handlers['instances'][$class];
    }

    /**
     * Imposta una determinata classe come resposabile per la gestione di una determinata tipologia di tag di input.
     *
     * @param string       $input
     * @param string|mixed $class
     */
    public function setHandler($input, $class)
    {
        $original = $class;

        $class = is_object($class) ? $class : new $class();

        if ($class instanceof Handler\HandlerInterface) {
            $this->handlers['list'][$input] = $original;
            $this->handlers['instances'][$original] = $class;
        }
    }

    /**
     * Restituisce l'oggetto responsabile per la costruzione del codice HTML contenente gli input effettivi.
     *
     * @return mixed
     */
    public function getWrapper()
    {
        if (empty($this->wrapper['instance'])) {
            $class = $this->wrapper['class'];
            $this->wrapper['instance'] = new $class();
        }

        return $this->wrapper['instance'];
    }

    /**
     * Imposta l'oggetto responsabile per la costruzione del codice HTML contenente gli input effettivi.
     *
     * @param string|mixed $class
     */
    public function setWrapper($class)
    {
        $original = $class;

        $class = is_object($class) ? $class : new $class();

        if ($class instanceof Wrapper\WrapperInterface) {
            $this->wrapper['class'] = $original;
            $this->wrapper['instance'] = $class;
        }
    }

    /**
     * Restituisce l'oggetto responsabile per la costruzione del codice HTML per il tag personalizzato.
     *
     * @param string $input
     *
     * @return mixed
     */
    public function getManager($input)
    {
        $result = null;

        $class = $this->managers['list'][$input];
        if (!empty($class)) {
            if (empty($this->managers['instances'][$class])) {
                $this->managers['instances'][$class] = new $class();
            }

            $result = $this->managers['instances'][$class];
        }

        return $result;
    }

    /**
     * Imposta l'oggetto responsabile per la costruzione del codice HTML per il tag personalizzato.
     *
     * @param string       $input
     * @param string|mixed $class
     */
    public function setManager($input, $class)
    {
        $original = $class;

        $class = is_object($class) ? $class : new $class();

        if ($class instanceof Handler\ManagerInterface) {
            $this->managers['list'][$input] = $original;
            $this->managers['instances'][$original] = $class;
        }
    }

    /**
     * Imposta l'oggetto responsabile per la costruzione del codice HTML per il tag personalizzato.
     *
     * @param string       $input
     * @param string|mixed $class
     */
    public function setRecord($record)
    {
        $this->record = $record;
    }
}
