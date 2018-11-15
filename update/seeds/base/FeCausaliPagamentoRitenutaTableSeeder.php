<?php

use Update\Seed;

class FeCausaliPagamentoRitenutaTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('fe_causali_pagamento_ritenuta')->truncate();

        $this->capsule->table('fe_causali_pagamento_ritenuta')->insert([
            [
                'codice' => 'A',
                'descrizione' => 'Prestazioni di lavoro autonomo rientranti nell\'esercizio di arte o professione abituale',
            ],
            [
                'codice' => 'B',
                'descrizione' => 'Utilizzazione economica, da parte dell\'autore o dell\'inventore, di opere dell\'ingegno, di brevetti industriali e di processi, formule o informazioni relativi a esperienze acquisite in campo industriale, commerciale o scientifico',
            ],
            [
                'codice' => 'C',
                'descrizione' => 'Utili derivanti da contratti di associazione in partecipazione e da contratti di cointeressenza, quando l\'apporto è costituito esclusivamente dalla prestazione di lavoro',
            ],
            [
                'codice' => 'D',
                'descrizione' => 'Utili spettanti ai soci promotori e ai soci fondatori delle società di capitali',
            ],
            [
                'codice' => 'E',
                'descrizione' => 'Levata di protesti cambiari da parte dei segretari comunali',
            ],
            [
                'codice' => 'G',
                'descrizione' => 'Indennità corrisposte per la cessazione di attività sportiva professionale',
            ],
            [
                'codice' => 'H',
                'descrizione' => 'Indennità corrisposte per la cessazione dei rapporti di agenzia delle persone fisiche e delle società di persone, con esclusione delle somme maturate entro il 31.12.2003, già imputate per competenza e tassate come reddito d\'impresa',
            ],
            [
                'codice' => 'I',
                'descrizione' => 'Indennità corrisposte per la cessazione da funzioni notarili',
            ],
            [
                'codice' => 'L',
                'descrizione' => 'Utilizzazione economica, da parte di soggetto diverso dall\'autore o dall\'inventore, di opere dell\'ingegno, di brevetti industriali e di processi, formule e informazioni relative a esperienze acquisite in campo industriale, commerciale o scientifico',
            ],
            [
                'codice' => 'M',
                'descrizione' => 'Prestazioni di lavoro autonomo non esercitate abitualmente, obblighi di fare, di non fare o permettere',
            ],
            [
                'codice' => 'N',
                'descrizione' => 'Indennità di trasferta, rimborso forfetario di spese, premi e compensi erogati nell\'esercizio diretto di attività sportive dilettantistiche e in relazione a rapporti di collaborazione coordinata e continuativa di carattere amministrativo-gestionale, di natura non profe
ssionale, resi a favore di società e associazioni sportive dilettantistiche e di cori, bande e filodrammatiche da parte del diretto
re e dei collaboratori tecnici',
            ],
            [
                'codice' => 'O',
            'descrizione' => 'Prestazioni di lavoro autonomo non esercitate abitualmente, obblighi di fare, di non fare o permettere, per le quali non sussiste l\'obbligo di iscrizione alla gestione separata (Circ. Inps 104/2001)',
            ],
            [
                'codice' => 'P',
                'descrizione' => 'Compensi corrisposti a soggetti non residenti privi di stabile organizzazione per l\'uso o la concessione in uso di attrezzature industriali, commerciali o scientifiche che si trovano nel territorio dello Stato ovvero a società svizzere o stabili organizzazioni di soci
età svizzere che possiedono i requisiti di cui all\'art. 15, c. 2 dell’Accordo tra la Comunità Europea e la Confederazione svizzera del 26.10
.2004 (pubblicato in G.U.C.E. 29.12.2004, n. 385/30)',
            ],
            [
                'codice' => 'Q',
                'descrizione' => 'Provvigioni corrisposte ad agente o rappresentante di commercio monomandatario',
            ],
            [
                'codice' => 'R',
                'descrizione' => 'Provvigioni corrisposte ad agente o rappresentante di commercio plurimandatario',
            ],
            [
                'codice' => 'S',
                'descrizione' => 'Provvigioni corrisposte a commissionario',
            ],
            [
                'codice' => 'T',
                'descrizione' => 'Provvigioni corrisposte a mediatore',
            ],
            [
                'codice' => 'U',
                'descrizione' => 'Provvigioni corrisposte a procacciatore di affari',
            ],
            [
                'codice' => 'V',
            'descrizione' => 'Provvigioni corrisposte a incaricato per le vendite a domicilio e provvigioni corrisposte a incaricato per la vendita porta a porta e per la vendita ambulante di giornali quotidiani e periodici (L. 25.02.1987, n. 67)',
            ],
            [
                'codice' => 'W',
                'descrizione' => 'Corrispettivi erogati nel 2013 per prestazioni relative a contratti d\'appalto cui si sono resi applicabili le disposizioni contenute nell\'art. 25-ter D.P.R. 600/1973',
            ],
            [
                'codice' => 'X',
                'descrizione' => 'Canoni corrisposti nel 2004 da società o enti residenti, ovvero da stabili organizzazioni di società estere di cui all\'art. 26-quater, c. 1, lett. a) e b) D.P.R. 600/1973, a società o stabili organizzazioni di società, situate in altro Stato membro dell\'Unione Europea in presenza dei relativi requisiti richiesti, per i quali è stato effettuato nel 2006 il rimborso della ritenuta ai sensi dell\'art. 4 D. Lgs. 143/2005',
            ],
            [
                'codice' => 'Y',
                'descrizione' => 'Canoni corrisposti dal 1.01.2005 al 26.07.2005 da soggetti di cui al punto precedente',
            ],
            [
                'codice' => 'Z',
                'descrizione' => 'Titolo diverso dai precedenti',
            ],
        ]);
    }
}
