<?php

use Update\Seed;

class InTipiinterventoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('in_tipiintervento')->truncate();

        $this->capsule->table('in_tipiintervento')->insert([
            [
                'idtipointervento' => 'GEN',
                'descrizione' => 'Generico',
                'costo_orario' => '30.0000',
                'costo_km' => '0.5000',
                'costo_diritto_chiamata' => '0.0000',
                'costo_orario_tecnico' => '0.0000',
                'costo_km_tecnico' => '0.0000',
                'costo_diritto_chiamata_tecnico' => '0.0000',
                'tempo_standard' => null,
            ],
            [
                'idtipointervento' => 'ODS',
                'descrizione' => 'Ordine di servizio',
                'costo_orario' => '0.0000',
                'costo_km' => '0.0000',
                'costo_diritto_chiamata' => '0.0000',
                'costo_orario_tecnico' => '0.0000',
                'costo_km_tecnico' => '0.0000',
                'costo_diritto_chiamata_tecnico' => '0.0000',
                'tempo_standard' => null,
            ],
        ]);
    }
}
