<?php

use Update\Seed;

class OrTipiordineTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('or_tipiordine')->truncate();

        $this->capsule->table('or_tipiordine')->insert([
            [
                'id' => 1,
                'descrizione' => 'Ordine fornitore',
                'dir' => 'uscita',
            ],
            [
                'id' => 2,
                'descrizione' => 'Ordine cliente',
                'dir' => 'entrata',
            ],
        ]);
    }
}
