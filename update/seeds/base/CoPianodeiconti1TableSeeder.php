<?php

use Update\Seed;

class CoPianodeiconti1TableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_pianodeiconti1')->truncate();

        $this->capsule->table('co_pianodeiconti1')->insert([
            [
                'id' => 1,
                'numero' => '01',
                'descrizione' => 'Patrimoniale',
            ],
            [
                'id' => 2,
                'numero' => '02',
                'descrizione' => 'Economico',
            ],
        ]);
    }
}
