<?php

use Update\Seed;

class ZzSegmentsTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_segments')->truncate();

        $this->capsule->table('zz_segments')->insert([
            [
                'id' => 1,
                'id_module' => 14,
                'name' => 'Standard vendite',
                'clause' => '1=1',
                'position' => 'WHR',
                'pattern' => '####/YYYY',
                'note' => '',
                'predefined' => 1,
                'predefined_accredito' => 0,
                'predefined_addebito' => 0,
                'is_fiscale' => 1,
            ],
            [
                'id' => 2,
                'id_module' => 15,
                'name' => 'Standard acquisti',
                'clause' => '1=1',
                'position' => 'WHR',
                'pattern' => '#',
                'note' => '',
                'predefined' => 1,
                'predefined_accredito' => 0,
                'predefined_addebito' => 0,
                'is_fiscale' => 1,
            ],
            [
                'id' => 3,
                'id_module' => 14,
                'name' => 'Fatture pro-forma',
                'clause' => '1=1',
                'position' => 'WHR',
                'pattern' => 'PRO-###',
                'note' => '',
                'predefined' => 0,
                'predefined_accredito' => 0,
                'predefined_addebito' => 0,
                'is_fiscale' => 0,
            ],
        ]);
    }
}
