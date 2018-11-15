<?php

use Update\Seed;

class OrStatiordineTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('or_statiordine')->truncate();

        $this->capsule->table('or_statiordine')->insert([
            [
                'id' => 1,
                'descrizione' => 'Bozza',
                'annullato' => 0,
                'icona' => 'fa fa-file-text-o text-muted',
                'completato' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'Evaso',
                'annullato' => 1,
                'icona' => 'fa fa-truck text-success',
                'completato' => 1,
            ],
            [
                'id' => 3,
                'descrizione' => 'Parzialmente evaso',
                'annullato' => 1,
                'icona' => 'fa fa-gear text-warning',
                'completato' => 1,
            ],
            [
                'id' => 4,
                'descrizione' => 'Parzialmente fatturato',
                'annullato' => 0,
                'icona' => 'fa fa-file-text-o text-warning',
                'completato' => 1,
            ],
            [
                'id' => 5,
                'descrizione' => 'Fatturato',
                'annullato' => 0,
                'icona' => 'fa fa-file-text-o text-success',
                'completato' => 1,
            ],
        ]);
    }
}
