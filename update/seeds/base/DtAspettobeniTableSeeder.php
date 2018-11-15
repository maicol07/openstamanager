<?php

use Update\Seed;

class DtAspettobeniTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('dt_aspettobeni')->truncate();

        $this->capsule->table('dt_aspettobeni')->insert([
            [
                'id' => 1,
                'descrizione' => 'A vista',
            ],
            [
                'id' => 2,
                'descrizione' => 'Cartoni',
            ],
            [
                'id' => 3,
                'descrizione' => 'Sacchi',
            ],
            [
                'id' => 4,
                'descrizione' => 'Scatola',
            ],
        ]);
    }
}
