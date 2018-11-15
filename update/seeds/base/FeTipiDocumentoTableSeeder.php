<?php

use Update\Seed;

class FeTipiDocumentoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('fe_tipi_documento')->truncate();

        $this->capsule->table('fe_tipi_documento')->insert([
            [
                'codice' => 'TD01',
                'descrizione' => 'Fattura',
            ],
            [
                'codice' => 'TD02',
                'descrizione' => 'Acconto/anticipo su fattura',
            ],
            [
                'codice' => 'TD03',
                'descrizione' => 'Acconto/anticipo su parcella',
            ],
            [
                'codice' => 'TD04',
                'descrizione' => 'Nota di credito',
            ],
            [
                'codice' => 'TD05',
                'descrizione' => 'Nota di debito',
            ],
            [
                'codice' => 'TD06',
                'descrizione' => 'Parcella',
            ],
        ]);
    }
}
