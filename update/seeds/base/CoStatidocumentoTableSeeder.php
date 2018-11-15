<?php

use Update\Seed;

class CoStatidocumentoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_statidocumento')->truncate();

        $this->capsule->table('co_statidocumento')->insert([
            [
                'id' => 1,
                'descrizione' => 'Pagato',
                'icona' => 'fa fa-check-circle text-success',
            ],
            [
                'id' => 2,
                'descrizione' => 'Bozza',
                'icona' => 'fa fa-file-text-o text-muted',
            ],
            [
                'id' => 3,
                'descrizione' => 'Emessa',
                'icona' => 'fa fa-clock-o text-info',
            ],
            [
                'id' => 4,
                'descrizione' => 'Annullata',
                'icona' => 'fa fa-times text-danger',
            ],
            [
                'id' => 5,
                'descrizione' => 'Parzialmente pagato',
                'icona' => 'fa fa-dot-circle-o text-warning',
            ],
        ]);
    }
}
