<?php

use Update\Seed;

class InVociservizioTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('in_vociservizio')->truncate();

        $this->capsule->table('in_vociservizio')->insert([
            [
                'id' => 1,
                'descrizione' => 'Manutenzione programmata',
                'categoria' => 'Intervento generico',
            ],
        ]);
    }
}
