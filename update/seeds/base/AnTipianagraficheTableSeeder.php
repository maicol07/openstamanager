<?php

use Update\Seed;

class AnTipianagraficheTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('an_tipianagrafiche')->truncate();

        $this->capsule->table('an_tipianagrafiche')->insert([
            [
                'idtipoanagrafica' => 1,
                'descrizione' => 'Cliente',
                'default' => 1,
            ],
            [
                'idtipoanagrafica' => 2,
                'descrizione' => 'Tecnico',
                'default' => 1,
            ],
            [
                'idtipoanagrafica' => 3,
                'descrizione' => 'Azienda',
                'default' => 1,
            ],
            [
                'idtipoanagrafica' => 4,
                'descrizione' => 'Fornitore',
                'default' => 1,
            ],
            [
                'idtipoanagrafica' => 5,
                'descrizione' => 'Vettore',
                'default' => 1,
            ],
            [
                'idtipoanagrafica' => 6,
                'descrizione' => 'Agente',
                'default' => 1,
            ],
        ]);
    }
}
