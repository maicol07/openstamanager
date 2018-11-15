<?php

use Update\Seed;

class DtSpedizioneTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('dt_spedizione')->truncate();

        $this->capsule->table('dt_spedizione')->insert([
            [
                'id' => 1,
                'descrizione' => 'A nostro carico',
                'esterno' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 2,
                'descrizione' => 'Vettore',
                'esterno' => 1,
                'predefined' => 0,
            ],
            [
                'id' => 3,
                'descrizione' => 'A carico del cliente',
                'esterno' => 0,
                'predefined' => 0,
            ],
        ]);
    }
}
