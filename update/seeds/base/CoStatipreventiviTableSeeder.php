<?php

use Update\Seed;

class CoStatipreventiviTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_statipreventivi')->truncate();

        $this->capsule->table('co_statipreventivi')->insert([
            [
                'id' => 1,
                'descrizione' => 'Bozza',
                'icona' => 'fa fa-file-text-o text-muted',
                'completato' => 0,
                'annullato' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'In attesa di conferma',
                'icona' => 'fa fa-clock-o text-warning',
                'completato' => 0,
                'annullato' => 0,
            ],
            [
                'id' => 3,
                'descrizione' => 'Accettato',
                'icona' => 'fa fa-thumbs-up text-success',
                'completato' => 0,
                'annullato' => 0,
            ],
            [
                'id' => 4,
                'descrizione' => 'Rifiutato',
                'icona' => 'fa fa-thumbs-down text-danger',
                'completato' => 0,
                'annullato' => 1,
            ],
            [
                'id' => 5,
                'descrizione' => 'In lavorazione',
                'icona' => 'fa fa-gear text-warning',
                'completato' => 1,
                'annullato' => 0,
            ],
            [
                'id' => 6,
                'descrizione' => 'Concluso',
                'icona' => 'fa fa-check text-success',
                'completato' => 0,
                'annullato' => 0,
            ],
            [
                'id' => 7,
                'descrizione' => 'Pagato',
                'icona' => 'fa fa-check-circle text-success',
                'completato' => 0,
                'annullato' => 0,
            ],
            [
                'id' => 8,
                'descrizione' => 'In attesa di pagamento',
                'icona' => 'fa fa-money text-primary',
                'completato' => 0,
                'annullato' => 0,
            ],
        ]);
    }
}
