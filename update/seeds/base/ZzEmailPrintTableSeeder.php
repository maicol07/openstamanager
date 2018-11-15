<?php

use Update\Seed;

class ZzEmailPrintTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_email_print')->truncate();

        $this->capsule->table('zz_email_print')->insert([
            [
                'id' => 1,
                'id_email' => 1,
                'id_print' => 10,
            ],
            [
                'id' => 2,
                'id_email' => 2,
                'id_print' => 22,
            ],
            [
                'id' => 3,
                'id_email' => 3,
                'id_print' => 18,
            ],
            [
                'id' => 4,
                'id_email' => 4,
                'id_print' => 20,
            ],
            [
                'id' => 5,
                'id_email' => 5,
                'id_print' => 27,
            ],
            [
                'id' => 6,
                'id_email' => 6,
                'id_print' => 1,
            ],
            [
                'id' => 7,
                'id_email' => 7,
                'id_print' => 21,
            ],
            [
                'id' => 8,
                'id_email' => 8,
                'id_print' => 23,
            ],
            [
                'id' => 9,
                'id_email' => 9,
                'id_print' => 24,
            ],
            [
                'id' => 10,
                'id_email' => 12,
                'id_print' => 19,
            ],
            [
                'id' => 11,
                'id_email' => 13,
                'id_print' => 1,
            ],
        ]);
    }
}
