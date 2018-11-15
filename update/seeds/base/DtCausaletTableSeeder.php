<?php

use Update\Seed;

class DtCausaletTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('dt_causalet')->truncate();

        $this->capsule->table('dt_causalet')->insert([
            [
                'id' => 1,
                'descrizione' => 'Vendita',
                'predefined' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'Noleggio',
                'predefined' => 0,
            ],
            [
                'id' => 3,
                'descrizione' => 'Reso',
                'predefined' => 0,
            ],
        ]);
    }
}
