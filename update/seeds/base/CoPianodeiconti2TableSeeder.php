<?php

use Update\Seed;

class CoPianodeiconti2TableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('co_pianodeiconti2')->truncate();

        $this->capsule->table('co_pianodeiconti2')->insert([
            [
                'id' => 1,
                'numero' => '100',
                'descrizione' => 'Cassa e banche',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 2,
                'numero' => '110',
                'descrizione' => 'Crediti clienti e crediti diversi',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 3,
                'numero' => '120',
                'descrizione' => 'Effetti attivi',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 4,
                'numero' => '130',
                'descrizione' => 'Ratei e risconti attivi',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 5,
                'numero' => '200',
                'descrizione' => 'Erario iva, INPS, IRPEF, INAIL, ecc',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 6,
                'numero' => '220',
                'descrizione' => 'Immobilizzazioni',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 7,
                'numero' => '230',
                'descrizione' => 'Rimanente magazzino',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 8,
                'numero' => '240',
                'descrizione' => 'Debiti fornitori e debiti diversi',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 9,
                'numero' => '250',
                'descrizione' => 'Ratei e risconti passivi',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 10,
                'numero' => '300',
                'descrizione' => 'Fondi ammortamento',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 11,
                'numero' => '310',
                'descrizione' => 'Altri fondi',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 12,
                'numero' => '400',
                'descrizione' => 'Capitale',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 14,
                'numero' => '600',
                'descrizione' => 'Costi merci c/acquisto',
                'idpianodeiconti1' => 2,
                'dir' => 'uscita',
            ],
            [
                'id' => 15,
                'numero' => '610',
                'descrizione' => 'Costi generali',
                'idpianodeiconti1' => 2,
                'dir' => 'uscita',
            ],
            [
                'id' => 16,
                'numero' => '620',
                'descrizione' => 'Costi diversi',
                'idpianodeiconti1' => 2,
                'dir' => 'uscita',
            ],
            [
                'id' => 17,
                'numero' => '630',
                'descrizione' => 'Costi del personale',
                'idpianodeiconti1' => 2,
                'dir' => '',
            ],
            [
                'id' => 18,
                'numero' => '640',
                'descrizione' => 'Costi ammortamenti',
                'idpianodeiconti1' => 2,
                'dir' => '',
            ],
            [
                'id' => 19,
                'numero' => '650',
                'descrizione' => 'Costi accantonamenti',
                'idpianodeiconti1' => 2,
                'dir' => '',
            ],
            [
                'id' => 20,
                'numero' => '700',
                'descrizione' => 'Ricavi',
                'idpianodeiconti1' => 2,
                'dir' => 'entrata',
            ],
            [
                'id' => 21,
                'numero' => '810',
                'descrizione' => 'Perdite e profitti',
                'idpianodeiconti1' => 1,
                'dir' => '',
            ],
            [
                'id' => 22,
                'numero' => '900',
                'descrizione' => 'Conti transitori',
                'idpianodeiconti1' => 2,
                'dir' => '',
            ],
        ]);
    }
}
