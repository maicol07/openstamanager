<?php

use Update\Seed;

class ZzEmailsTableSeeder extends Seed
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->capsule->table('zz_emails')->truncate();

        $this->capsule->table('zz_emails')->insert([
            [
                'id' => 1,
                'id_module' => 3,
                'id_smtp' => 1,
                'name' => 'Rapportino intervento',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio rapportino numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato il rapportino numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 1,
            ],
            [
                'id' => 2,
                'id_module' => 13,
                'id_smtp' => 1,
                'name' => 'Preventivo',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio preventivo numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato il preventivo numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 3,
                'id_module' => 31,
                'id_smtp' => 1,
                'name' => 'Contratto',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio contratto numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato il contratto numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 4,
                'id_module' => 24,
                'id_smtp' => 1,
                'name' => 'Ordine',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio ordine numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato l\'ordine numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 5,
                'id_module' => 25,
                'id_smtp' => 1,
                'name' => 'Ordine',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio ordine numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato l\'ordine numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 6,
                'id_module' => 14,
                'id_smtp' => 1,
                'name' => 'Fattura',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio fattura numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato la fattura numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 1,
            ],
            [
                'id' => 7,
                'id_module' => 26,
                'id_smtp' => 1,
                'name' => 'Ddt',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio ddt {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato il ddt numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 8,
                'id_module' => 31,
                'id_smtp' => 1,
                'name' => 'Consuntivo contratto',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio consuntivo contratto numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato il rapportino numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 9,
                'id_module' => 13,
                'id_smtp' => 1,
                'name' => 'Consuntivo preventivo',
                'icon' => 'fa fa-envelope',
                'subject' => 'Invio consuntivo del preventivo numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato il rapportino numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 10,
                'id_module' => 3,
                'id_smtp' => 1,
                'name' => 'Notifica intervento',
                'icon' => 'fa fa-envelope',
                'subject' => 'Notifica intervento numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Tecnico,</p>
<p>un nuovo intervento {numero} in {data} è stato aggiunto.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 11,
                'id_module' => 3,
                'id_smtp' => 1,
                'name' => 'Notifica rimozione intervento',
                'icon' => 'fa fa-envelope',
                'subject' => 'Notifica intervento numero {numero} del {data}',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Tecnico,</p>
<p>sei stato rimosso dall\'intervento {numero} in {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 12,
                'id_module' => 3,
                'id_smtp' => 1,
                'name' => 'Stato intervento',
                'icon' => 'fa fa-envelope',
                'subject' => 'Intervento numero {numero} del {data}: {stato}.',
                'reply_to' => '',
                'cc' => '',
                'bcc' => '',
                'body' => '<p>Gentile Utente,</p>
<p>l\'intervento {numero} in {data} è stato spostato nello stato {stato}.</p>',
                'read_notify' => 0,
                'predefined' => 0,
            ],
            [
                'id' => 13,
                'id_module' => 14,
                'id_smtp' => 2,
                'name' => 'PEC',
                'icon' => 'fa fa-file',
                'subject' => 'Invio fattura numero {numero} del {data}',
                'reply_to' => '',
                'cc' => 'sdi01@pec.fatturapa.it',
                'bcc' => '',
                'body' => '<p>Gentile Cliente,</p>
<p>inviamo in allegato la fattura numero {numero} del {data}.</p>
<p>&nbsp;</p>
<p>Distinti saluti</p>
',
                'read_notify' => 0,
                'predefined' => 0,
            ],
        ]);
    }
}
