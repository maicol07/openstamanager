<?php

use Update\Seed;

class DtTipiddtTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('dt_tipiddt')->truncate();

        $this->capsule->table('dt_tipiddt')->insert([
            [
                'id' => 1,
                'descrizione' => 'Ddt in ingresso',
                'dir' => 'uscita',
            ],
            [
                'id' => 2,
                'descrizione' => 'Ddt in uscita',
                'dir' => 'entrata',
            ],
        ]);
    }
}
