<?php

use Update\Seed;

class MgUnitamisuraTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('mg_unitamisura')->truncate();

        $this->capsule->table('mg_unitamisura')->insert([
            [
                'id' => 1,
                'valore' => 'nr',
            ],
            [
                'id' => 2,
                'valore' => 'kg',
            ],
            [
                'id' => 3,
                'valore' => 'pz',
            ],
            [
                'id' => 4,
                'valore' => 'litri',
            ],
            [
                'id' => 5,
                'valore' => 'ore',
            ],
        ]);
    }
}
