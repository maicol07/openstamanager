<?php

use Update\Seed;

class CoTipidocumentoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_tipidocumento')->truncate();

        $this->capsule->table('co_tipidocumento')->insert([
            [
                'id' => 1,
                'descrizione' => 'Fattura immediata di acquisto',
                'dir' => 'uscita',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD01',
            ],
            [
                'id' => 2,
                'descrizione' => 'Fattura immediata di vendita',
                'dir' => 'entrata',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD01',
            ],
            [
                'id' => 3,
                'descrizione' => 'Fattura differita di acquisto',
                'dir' => 'uscita',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD01',
            ],
            [
                'id' => 4,
                'descrizione' => 'Fattura differita di vendita',
                'dir' => 'entrata',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD01',
            ],
            [
                'id' => 5,
                'descrizione' => 'Fattura accompagnatoria di acquisto',
                'dir' => 'uscita',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD01',
            ],
            [
                'id' => 6,
                'descrizione' => 'Fattura accompagnatoria di vendita',
                'dir' => 'entrata',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD01',
            ],
            [
                'id' => 7,
                'descrizione' => 'Nota di credito',
                'dir' => 'uscita',
                'reversed' => 1,
                'codice_tipo_documento_fe' => 'TD04',
            ],
            [
                'id' => 8,
                'descrizione' => 'Nota di debito',
                'dir' => 'uscita',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD05',
            ],
            [
                'id' => 9,
                'descrizione' => 'Nota di credito',
                'dir' => 'entrata',
                'reversed' => 1,
                'codice_tipo_documento_fe' => 'TD04',
            ],
            [
                'id' => 10,
                'descrizione' => 'Nota di debito',
                'dir' => 'entrata',
                'reversed' => 0,
                'codice_tipo_documento_fe' => 'TD05',
            ],
        ]);
    }
}
