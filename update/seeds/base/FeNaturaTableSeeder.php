<?php

use Update\Seed;

class FeNaturaTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('fe_natura')->truncate();

        $this->capsule->table('fe_natura')->insert([
            [
                'codice' => 'N1',
                'descrizione' => 'Escluse ex art. 15',
            ],
            [
                'codice' => 'N2',
                'descrizione' => 'Non soggette',
            ],
            [
                'codice' => 'N3',
                'descrizione' => 'Non imponibili',
            ],
            [
                'codice' => 'N4',
                'descrizione' => 'Esenti',
            ],
            [
                'codice' => 'N5',
                'descrizione' => 'Regime del margine / IVA non esposta in fattura',
            ],
            [
                'codice' => 'N6',
                'descrizione' => 'Inversione contabile (per le operazioni in reverse charge ovvero nei casi di autofatturazione per acquisti extra UE di servizi ovvero per importazioni di beni nei soli casi previsti)',
            ],
            [
                'codice' => 'N7',
                'descrizione' => 'IVA assolta in altro stato UE (vendite a distanza ex art. 40 c. 3 e 4 e art. 41 c. 1 lett. b, DL 331/93; prestazione di servizi di telecomunicazioni, tele-radiodiffusione ed elettronici ex art. 7-sexies lett. f, g, art. 74-sexies DPR 633/72)',
            ],
        ]);
    }
}
