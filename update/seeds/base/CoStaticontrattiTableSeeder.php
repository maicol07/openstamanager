<?php

use Update\Seed;

class CoStaticontrattiTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_staticontratti')->truncate();

        $this->capsule->table('co_staticontratti')->insert([
            [
                'id' => 1,
                'descrizione' => 'Bozza',
                'icona' => 'fa fa-file-text-o text-muted',
                'pianificabile' => 0,
                'fatturabile' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'In attesa di conferma',
                'icona' => 'fa fa-clock-o text-warning',
                'pianificabile' => 0,
                'fatturabile' => 1,
            ],
            [
                'id' => 3,
                'descrizione' => 'Accettato',
                'icona' => 'fa fa-thumbs-up text-success',
                'pianificabile' => 1,
                'fatturabile' => 1,
            ],
            [
                'id' => 4,
                'descrizione' => 'Rifiutato',
                'icona' => 'fa fa-thumbs-down text-danger',
                'pianificabile' => 0,
                'fatturabile' => 0,
            ],
            [
                'id' => 5,
                'descrizione' => 'In lavorazione',
                'icona' => 'fa fa-gear text-warning',
                'pianificabile' => 1,
                'fatturabile' => 1,
            ],
            [
                'id' => 6,
                'descrizione' => 'In attesa di pagamento',
                'icona' => 'fa fa-money text-primary',
                'pianificabile' => 1,
                'fatturabile' => 1,
            ],
            [
                'id' => 7,
                'descrizione' => 'Pagato',
                'icona' => 'fa fa-check-circle text-success',
                'pianificabile' => 1,
                'fatturabile' => 1,
            ],
            [
                'id' => 8,
                'descrizione' => 'Concluso',
                'icona' => 'fa fa-check text-success',
                'pianificabile' => 0,
                'fatturabile' => 1,
            ],
        ]);
    }
}
