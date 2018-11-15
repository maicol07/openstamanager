<?php

use Update\Seed;

class DtStatiddtTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('dt_statiddt')->truncate();

        $this->capsule->table('dt_statiddt')->insert([
            [
                'id' => 1,
                'descrizione' => 'Bozza',
                'icona' => 'fa fa-file-text-o text-muted',
                'completato' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'Evaso',
                'icona' => 'fa fa-truck text-success',
                'completato' => 1,
            ],
            [
                'id' => 3,
                'descrizione' => 'Fatturato',
                'icona' => 'fa fa-file-text-o text-success',
                'completato' => 1,
            ],
            [
                'id' => 4,
                'descrizione' => 'Parzialmente fatturato',
                'icona' => 'fa fa-file-text-o text-warning',
                'completato' => 1,
            ],
            [
                'id' => 5,
                'descrizione' => 'Parzialmente evaso',
                'icona' => 'fa fa-truck text-warning',
                'completato' => 1,
            ],
        ]);
    }
}
