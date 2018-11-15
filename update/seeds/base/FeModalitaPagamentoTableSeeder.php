<?php

use Update\Seed;

class FeModalitaPagamentoTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('fe_modalita_pagamento')->truncate();

        $this->capsule->table('fe_modalita_pagamento')->insert([
            [
                'codice' => 'MP01',
                'descrizione' => 'Contanti',
            ],
            [
                'codice' => 'MP02',
                'descrizione' => 'Assegno',
            ],
            [
                'codice' => 'MP03',
                'descrizione' => 'Assegno circolare',
            ],
            [
                'codice' => 'MP04',
                'descrizione' => 'Contanti presso Tesoreria',
            ],
            [
                'codice' => 'MP05',
                'descrizione' => 'Bonifico',
            ],
            [
                'codice' => 'MP06',
                'descrizione' => 'Vaglia cambiario',
            ],
            [
                'codice' => 'MP07',
                'descrizione' => 'Bollettino bancario',
            ],
            [
                'codice' => 'MP08',
                'descrizione' => 'Carta di pagamento',
            ],
            [
                'codice' => 'MP09',
                'descrizione' => 'RID',
            ],
            [
                'codice' => 'MP10',
                'descrizione' => 'RID utenze',
            ],
            [
                'codice' => 'MP11',
                'descrizione' => 'RID veloce',
            ],
            [
                'codice' => 'MP12',
                'descrizione' => 'RIBA',
            ],
            [
                'codice' => 'MP13',
                'descrizione' => 'MAV',
            ],
            [
                'codice' => 'MP14',
                'descrizione' => 'Quietanza erario',
            ],
            [
                'codice' => 'MP15',
                'descrizione' => 'Giroconto su conti di contabilità speciale',
            ],
            [
                'codice' => 'MP16',
                'descrizione' => 'Domiciliazione bancaria',
            ],
            [
                'codice' => 'MP17',
                'descrizione' => 'Domiciliazione postale',
            ],
            [
                'codice' => 'MP18',
                'descrizione' => 'Bollettino di c/c postale',
            ],
            [
                'codice' => 'MP19',
                'descrizione' => 'SEPA Direct Debit',
            ],
            [
                'codice' => 'MP20',
                'descrizione' => 'SEPA Direct Debit CORE',
            ],
            [
                'codice' => 'MP21',
                'descrizione' => 'SEPA Direct Debit B2B',
            ],
            [
                'codice' => 'MP22',
                'descrizione' => 'Trattenuta su somme già riscosse',
            ],
        ]);
    }
}
