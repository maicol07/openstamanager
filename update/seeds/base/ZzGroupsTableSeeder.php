<?php

use Update\Seed;

class ZzGroupsTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_groups')->truncate();

        $this->capsule->table('zz_groups')->insert([
            [
                'id' => 1,
                'nome' => 'Amministratori',
                'editable' => 0,
            ],
            [
                'id' => 2,
                'nome' => 'Tecnici',
                'editable' => 0,
            ],
            [
                'id' => 3,
                'nome' => 'Agenti',
                'editable' => 0,
            ],
            [
                'id' => 4,
                'nome' => 'Clienti',
                'editable' => 0,
            ],
        ]);
    }
}
