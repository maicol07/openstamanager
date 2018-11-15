<?php

use Update\Seed;

class ZzDocumentiCategorieTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_documenti_categorie')->truncate();

        $this->capsule->table('zz_documenti_categorie')->insert([
            [
                'id' => 1,
                'descrizione' => 'Documenti società',
            ],
            [
                'id' => 2,
                'descrizione' => 'Contratti assunzione personale',
            ],
        ]);
    }
}
