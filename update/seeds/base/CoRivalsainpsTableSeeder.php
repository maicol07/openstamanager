<?php

use Update\Seed;

class CoRivalsainpsTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_rivalsainps')->truncate();

        $this->capsule->table('co_rivalsainps')->insert([
            [
                'id' => 1,
                'descrizione' => 'Rivalsa INPS 4%',
                'percentuale' => '4.00',
                'indetraibile' => '0.00',
                'esente' => 0,
            ],
        ]);
    }
}
