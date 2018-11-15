<?php

use Update\Seed;

class InStatiinterventoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('in_statiintervento')->truncate();

        $this->capsule->table('in_statiintervento')->insert([
            [
                'idstatointervento' => 'CALL',
                'descrizione' => 'Chiamata',
                'colore' => '#96c0ff',
                'can_delete' => 1,
                'completato' => 0,
                'notifica' => 0,
                'id_email' => 12,
                'destinatari' => null,
            ],
            [
                'idstatointervento' => 'FAT',
                'descrizione' => 'Fatturato',
                'colore' => '#55FF55',
                'can_delete' => 0,
                'completato' => 1,
                'notifica' => 0,
                'id_email' => 12,
                'destinatari' => null,
            ],
            [
                'idstatointervento' => 'OK',
                'descrizione' => 'Completato',
                'colore' => '#a3ff82',
                'can_delete' => 0,
                'completato' => 1,
                'notifica' => 0,
                'id_email' => 12,
                'destinatari' => null,
            ],
            [
                'idstatointervento' => 'WIP',
                'descrizione' => 'In programmazione',
                'colore' => '#ffc400',
                'can_delete' => 0,
                'completato' => 0,
                'notifica' => 0,
                'id_email' => 12,
                'destinatari' => null,
            ],
        ]);
    }
}
