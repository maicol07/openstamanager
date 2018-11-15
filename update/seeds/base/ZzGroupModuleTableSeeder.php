<?php

use Update\Seed;

class ZzGroupModuleTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_group_module')->truncate();

        $this->capsule->table('zz_group_module')->insert([
            [
                'id' => 1,
                'idgruppo' => 2,
                'idmodule' => 3,
                'name' => 'Mostra interventi ai tecnici coinvolti',
            'clause' => ' in_interventi.id IN (SELECT idintervento FROM in_interventi_tecnici WHERE idintervento=in_interventi.id AND idtecnico=|id_anagrafica|)',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 2,
                'idgruppo' => 2,
                'idmodule' => 2,
                'name' => 'Mostra ai tecnici solo le anagrafiche in cui sono coinvolti con delle attività',
            'clause' => ' an_anagrafiche.idanagrafica IN (SELECT idanagrafica FROM in_interventi_tecnici INNER JOIN in_interventi ON in_interventi_tecnici.idintervento=in_interventi.id WHERE in_interventi.idanagrafica=an_anagrafiche.idanagrafica AND idtecnico=|id_anagrafica|)',
                'position' => 'WHR',
                'enabled' => 0,
                'default' => 1,
            ],
            [
                'id' => 3,
                'idgruppo' => 3,
                'idmodule' => 2,
                'name' => 'Mostra agli agenti solo le anagrafiche di cui sono agenti',
                'clause' => ' an_anagrafiche.idagente=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 4,
                'idgruppo' => 4,
                'idmodule' => 2,
                'name' => 'Mostra ai clienti solo la propria anagrafica',
                'clause' => ' an_anagrafiche.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 5,
                'idgruppo' => 4,
                'idmodule' => 3,
                'name' => 'Mostra interventi ai clienti coinvolti',
                'clause' => ' in_interventi.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 6,
                'idgruppo' => 4,
                'idmodule' => 14,
                'name' => 'Mostra ai clienti solo le proprie fatture',
                'clause' => ' co_documenti.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 7,
                'idgruppo' => 3,
                'idmodule' => 16,
                'name' => 'Mostra agli agenti solo la prima nota delle anagrafiche di cui sono agenti',
                'clause' => ' idagente=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 8,
                'idgruppo' => 4,
                'idmodule' => 30,
                'name' => 'Mostra ai clienti solo i propri impianti',
                'clause' => ' my_impianti.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 1,
                'default' => 1,
            ],
            [
                'id' => 9,
                'idgruppo' => 4,
                'idmodule' => 26,
                'name' => 'Mostra ddt di vendita ai clienti coinvolti',
                'clause' => 'dt_ddt.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 0,
                'default' => 1,
            ],
            [
                'id' => 10,
                'idgruppo' => 4,
                'idmodule' => 24,
                'name' => 'Mostra ordini cliente ai clienti coinvolti',
                'clause' => 'or_ordini.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 0,
                'default' => 1,
            ],
            [
                'id' => 11,
                'idgruppo' => 4,
                'idmodule' => 14,
                'name' => 'Mostra ai clienti solo le proprie fatture',
                'clause' => 'co_documenti.idanagrafica=|id_anagrafica|',
                'position' => 'WHR',
                'enabled' => 0,
                'default' => 1,
            ],
        ]);
    }
}
