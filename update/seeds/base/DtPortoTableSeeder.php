<?php

use Update\Seed;

class DtPortoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('dt_porto')->truncate();

        $this->capsule->table('dt_porto')->insert([
            [
                'id' => 1,
                'descrizione' => 'Franco',
                'predefined' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'Assegnato',
                'predefined' => 0,
            ],
        ]);
    }
}
