<?php

use Update\Seed;

class ZzSmtpsTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_smtps')->truncate();

        $this->capsule->table('zz_smtps')->insert([
            [
                'id' => 1,
                'name' => 'Account email da Impostazioni',
                'note' => '',
                'server' => 'localhost',
                'port' => '25',
                'username' => '',
                'password' => '',
                'from_name' => '',
                'from_address' => '',
                'encryption' => '',
                'pec' => 0,
                'predefined' => 1,
            ],
            [
                'id' => 2,
                'name' => 'PEC aziendale',
                'note' => '',
                'server' => '',
                'port' => '',
                'username' => '',
                'password' => '',
                'from_name' => '',
                'from_address' => '',
                'encryption' => '',
                'pec' => 1,
                'predefined' => 0,
            ],
        ]);
    }
}
