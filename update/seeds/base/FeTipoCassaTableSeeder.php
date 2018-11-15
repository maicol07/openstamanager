<?php

use Update\Seed;

class FeTipoCassaTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('fe_tipo_cassa')->truncate();

        $this->capsule->table('fe_tipo_cassa')->insert([
            [
                'codice' => 'TC01',
                'descrizione' => 'Cassa nazionale previdenza e assistenza avvocati e procuratori legali',
            ],
            [
                'codice' => 'TC02',
                'descrizione' => 'Cassa previdenza dottori commercialisti',
            ],
            [
                'codice' => 'TC03',
                'descrizione' => 'Cassa previdenza e assistenza geometri',
            ],
            [
                'codice' => 'TC04',
                'descrizione' => 'Cassa nazionale previdenza e assistenza ingegneri e architetti liberi professionisti',
            ],
            [
                'codice' => 'TC05',
                'descrizione' => 'Cassa nazionale del notariato',
            ],
            [
                'codice' => 'TC06',
                'descrizione' => 'Cassa nazionale previdenza e assistenza ragionieri e periti commerciali',
            ],
            [
                'codice' => 'TC07',
            'descrizione' => 'Ente nazionale assistenza agenti e rappresentanti di commercio (ENASARCO)',
            ],
            [
                'codice' => 'TC08',
            'descrizione' => 'Ente nazionale previdenza e assistenza consulenti del lavoro (ENPACL)',
            ],
            [
                'codice' => 'TC09',
            'descrizione' => 'Ente nazionale previdenza e assistenza medici (ENPAM)',
            ],
            [
                'codice' => 'TC10',
            'descrizione' => 'Ente nazionale previdenza e assistenza farmacisti (ENPAF)',
            ],
            [
                'codice' => 'TC11',
            'descrizione' => 'Ente nazionale previdenza e assistenza veterinari (ENPAV)',
            ],
            [
                'codice' => 'TC12',
            'descrizione' => 'Ente nazionale previdenza e assistenza impiegati dell agricoltura (ENPAIA)',
            ],
            [
                'codice' => 'TC13',
                'descrizione' => 'Fondo previdenza impiegati imprese di spedizione e agenzie marittime',
            ],
            [
                'codice' => 'TC14',
            'descrizione' => 'Istituto nazionale previdenza giornalisti italiani (INPGI)',
            ],
            [
                'codice' => 'TC15',
            'descrizione' => 'Opera nazionale assistenza orfani sanitari italiani (ONAOSI)',
            ],
            [
                'codice' => 'TC16',
            'descrizione' => 'Cassa autonoma assistenza integrativa giornalisti italiani (CASAGIT)',
            ],
            [
                'codice' => 'TC17',
            'descrizione' => 'Ente previdenza periti industriali e periti industriali laureati (EPPI)',
            ],
            [
                'codice' => 'TC18',
            'descrizione' => 'Ente previdenza e assistenza pluricategoriale (EPAP)',
            ],
            [
                'codice' => 'TC19',
            'descrizione' => 'Ente nazionale previdenza e assistenza biologi (ENPAB)',
            ],
            [
                'codice' => 'TC20',
            'descrizione' => 'Ente nazionale previdenza e assistenza professione infermieristica (ENPAPI)',
            ],
            [
                'codice' => 'TC21',
            'descrizione' => 'Ente nazionale previdenza e assistenza psicologi (ENPAP)',
            ],
            [
                'codice' => 'TC22',
                'descrizione' => 'INPS',
            ],
        ]);
    }
}
