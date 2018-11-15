<?php

use Update\Seed;

class CoRitenutaaccontoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_ritenutaacconto')->truncate();

        $this->capsule->table('co_ritenutaacconto')->insert([
            [
                'id' => 1,
                'descrizione' => 'Ritenuta d\'acconto 20%',
                'percentuale' => '20.00',
                'indetraibile' => '0.00',
                'esente' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'Ritenuta d\'acconto 10%',
                'percentuale' => '10.00',
                'indetraibile' => '0.00',
                'esente' => 0,
            ],
            [
                'id' => 3,
                'descrizione' => 'Ritenuta d\'acconto 4%',
                'percentuale' => '4.00',
                'indetraibile' => '0.00',
                'esente' => 0,
            ],
        ]);
    }
}
