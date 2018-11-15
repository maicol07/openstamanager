<?php

use Update\Seed;

class AnRelazioniTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('an_relazioni')->truncate();

        $this->capsule->table('an_relazioni')->insert([
            [
                'id' => 1,
                'descrizione' => 'Da contattare',
                'colore' => '#caffb7',
            ],
            [
                'id' => 2,
                'descrizione' => 'Da richiamare',
                'colore' => '#8fbafd',
            ],
            [
                'id' => 3,
                'descrizione' => 'Da non richiamare',
                'colore' => '#ff908c',
            ],
            [
                'id' => 4,
                'descrizione' => 'Appuntamento fissato',
                'colore' => '#ffc400',
            ],
            [
                'id' => 5,
                'descrizione' => 'Attivo',
                'colore' => '#00b913',
            ],
            [
                'id' => 6,
                'descrizione' => 'Dormiente',
                'colore' => '#a2a2a2',
            ],
        ]);
    }
}
