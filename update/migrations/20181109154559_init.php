<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Init extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('an_anagrafiche', ['id' => 'idanagrafica', 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('ragione_sociale', 'string', ['null' => false])
            ->addColumn('tipo', 'enum', ['null' => false, 'limit' => 13, 'values' => ['', 'Azienda', 'Privato', 'Ente pubblico']])
            ->addColumn('piva', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('codice_fiscale', 'string', ['null' => false, 'limit' => 16])
            ->addColumn('capitale_sociale', 'string', ['null' => false])
            ->addColumn('data_nascita', 'date', ['null' => false])
            ->addColumn('luogo_nascita', 'string', ['null' => false])
            ->addColumn('sesso', 'enum', ['null' => false, 'limit' => 1, 'values' => ['', 'M', 'F']])
            ->addColumn('indirizzo', 'string', ['null' => false])
            ->addColumn('indirizzo2', 'string', ['null' => false])
            ->addColumn('citta', 'string', ['null' => false])
            ->addColumn('cap', 'string', ['null' => false, 'limit' => 10])
            ->addColumn('provincia', 'string', ['null' => false, 'limit' => 2])
            ->addColumn('km', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->addColumn('id_nazione', 'integer', ['null' => true])
            ->addColumn('telefono', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('fax', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('cellulare', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('email', 'string', ['null' => false])
            ->addColumn('pec', 'string', ['null' => false])
            ->addColumn('sitoweb', 'string', ['null' => false])
            ->addColumn('note', 'string', ['null' => false])
            ->addColumn('codiceri', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('codicerea', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('appoggiobancario', 'string', ['null' => false])
            ->addColumn('filiale', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('codiceiban', 'string', ['null' => false, 'limit' => 40])
            ->addColumn('bic', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('diciturafissafattura', 'string', ['null' => false])
            ->addColumn('idpagamento_vendite', 'integer', ['null' => true])
            ->addColumn('idpagamento_acquisti', 'integer', ['null' => true])
            ->addColumn('idlistino_vendite', 'integer', ['null' => true])
            ->addColumn('idlistino_acquisti', 'integer', ['null' => true])
            ->addColumn('idiva_vendite', 'integer', ['null' => true])
            ->addColumn('idiva_acquisti', 'integer', ['null' => true])
            ->addColumn('id_ritenuta_acconto_vendite', 'integer', ['null' => true])
            ->addColumn('id_ritenuta_acconto_acquisti', 'integer', ['null' => true])
            ->addColumn('idsede_fatturazione', 'integer', ['null' => false])
            ->addColumn('idconto_cliente', 'integer', ['null' => false])
            ->addColumn('idbanca_vendite', 'integer', ['null' => false])
            ->addColumn('idbanca_acquisti', 'integer', ['null' => false])
            ->addColumn('idconto_fornitore', 'integer', ['null' => false])
            ->addColumn('settore', 'string', ['null' => false])
            ->addColumn('marche', 'string', ['null' => false, 'limit' => 5000])
            ->addColumn('dipendenti', 'integer', ['null' => false])
            ->addColumn('macchine', 'integer', ['null' => false])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('idrelazione', 'integer', ['null' => false])
            ->addColumn('agentemaster', 'boolean', ['null' => false])
            ->addColumn('idzona', 'integer', ['null' => false])
            ->addColumn('foro_competenza', 'string', ['null' => false])
            ->addColumn('nome_cognome', 'string', ['null' => false])
            ->addColumn('iscrizione_tribunale', 'string', ['null' => false, 'limit' => 2])
            ->addColumn('cciaa', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('cciaa_citta', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('n_alboartigiani', 'string', ['null' => true, 'limit' => 25])
            ->addColumn('colore', 'string', ['null' => false, 'default' => '#FFFFFF', 'limit' => 7])
            ->addTimestamps()
            ->addColumn('idtipointervento_default', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('gaddress', 'string', ['null' => true])
            ->addColumn('lat', 'float', ['null' => true, 'precision' => 10, 'scale' => 6])
            ->addColumn('lng', 'float', ['null' => true, 'precision' => 10, 'scale' => 6])
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addColumn('codice_destinatario', 'string', ['null' => true, 'limit' => 7])
            ->save();

        $table->addIndex(['id_nazione'], ['name' => 'id_nazione', 'unique' => false])->save();

        $table = $this->table('an_anagrafiche_agenti', ['id' => false, 'primary_key' => ['idanagrafica', 'idagente'], 'engine' => 'InnoDB']);
        $table->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('an_nazioni', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('iso2', 'string', ['null' => false, 'limit' => 2])
            ->addTimestamps()
            ->addColumn('name', 'string', ['null' => true])
            ->save();

        $table = $this->table('an_referenti', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('mansione', 'string', ['null' => false])
            ->addColumn('telefono', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('email', 'string', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('an_relazioni', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('colore', 'string', ['null' => false, 'limit' => 7])
            ->addTimestamps()
            ->save();

        $table = $this->table('an_sedi', ['engine' => 'InnoDB']);
        $table->addColumn('nomesede', 'string', ['null' => false, 'comment' => 'Nome sede'])
            ->addColumn('piva', 'string', ['null' => false, 'limit' => 15, 'comment' => 'P.Iva'])
            ->addColumn('codice_fiscale', 'string', ['null' => false, 'limit' => 16, 'comment' => 'Codice Fiscale'])
            ->addColumn('indirizzo', 'string', ['null' => false, 'comment' => 'Indirizzo'])
            ->addColumn('indirizzo2', 'string', ['null' => false, 'comment' => 'Indirizzo2'])
            ->addColumn('citta', 'string', ['null' => false, 'comment' => 'Citt&agrave;'])
            ->addColumn('cap', 'string', ['null' => false, 'limit' => 10, 'comment' => 'C.A.P.'])
            ->addColumn('provincia', 'string', ['null' => false, 'limit' => 2, 'comment' => 'Provincia'])
            ->addColumn('km', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->addColumn('id_nazione', 'integer', ['null' => true, 'precision' => 10, 'comment' => 'Nazione'])
            ->addColumn('telefono', 'string', ['null' => false, 'limit' => 20, 'comment' => 'Telefono'])
            ->addColumn('fax', 'string', ['null' => false, 'limit' => 20, 'comment' => 'Fax'])
            ->addColumn('cellulare', 'string', ['null' => false, 'limit' => 20, 'comment' => 'Cellulare'])
            ->addColumn('email', 'string', ['null' => false, 'comment' => 'Email'])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idzona', 'integer', ['null' => false])
            ->addTimestamps()
            ->addColumn('gaddress', 'string', ['null' => true])
            ->addColumn('lat', 'float', ['null' => true, 'precision' => 10, 'scale' => 6])
            ->addColumn('lng', 'float', ['null' => true, 'precision' => 10, 'scale' => 6])
            ->save();

        $table->addIndex(['id_nazione'], ['name' => 'id_nazione', 'unique' => false])->save();

        $table = $this->table('an_tipianagrafiche', ['id' => false, 'primary_key' => ['idtipoanagrafica'], 'engine' => 'InnoDB']);
        $table->addColumn('idtipoanagrafica', 'integer', ['null' => false, 'precision' => 10, 'identity' => 'enable'])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->save();

        $table = $this->table('an_tipianagrafiche_anagrafiche', ['id' => false, 'primary_key' => ['idtipoanagrafica', 'idanagrafica'], 'engine' => 'InnoDB']);
        $table->addColumn('idtipoanagrafica', 'integer', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idanagrafica'], ['name' => 'idanagrafica', 'unique' => false])->save();

        $table = $this->table('an_zone', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 2000])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_banche', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('filiale', 'string', ['null' => false])
            ->addColumn('iban', 'string', ['null' => false, 'limit' => 32])
            ->addColumn('bic', 'string', ['null' => false, 'limit' => 11])
            ->addColumn('id_pianodeiconti3', 'integer', ['null' => true])
            ->addColumn('note', 'text', ['null' => false])
            ->addTimestamps()
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->save();

        $table = $this->table('co_contratti', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('nome', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('data_bozza', 'date', ['null' => true])
            ->addColumn('data_accettazione', 'date', ['null' => true])
            ->addColumn('data_rifiuto', 'date', ['null' => true])
            ->addColumn('data_conclusione', 'date', ['null' => true])
            ->addColumn('rinnovabile', 'boolean', ['null' => false])
            ->addColumn('giorni_preavviso_rinnovo', 'integer', ['null' => false, 'precision' => 5])
            ->addColumn('budget', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('descrizione', 'text', ['null' => true])
            ->addColumn('idstato', 'integer', ['null' => true,  'precision' => 3])
            ->addColumn('idreferente', 'integer', ['null' => true])
            ->addColumn('validita', 'integer', ['null' => true])
            ->addColumn('esclusioni', 'text', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('idpagamento', 'integer', ['null' => false])
            ->addColumn('costo_diritto_chiamata', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('ore_lavoro', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_orario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addTimestamps()
            ->addColumn('idcontratto_prev', 'integer', ['null' => false])
            ->addColumn('sconto_globale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto_globale', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('codice_cig', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('codice_cup', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('id_documento_fe', 'string', ['null' => true, 'limit' => 20])
            ->save();

        $table = $this->table('co_contratti_tipiintervento', ['id' => false, 'primary_key' => ['idcontratto', 'idtipointervento'], 'engine' => 'InnoDB']);
        $table->addColumn('idcontratto', 'integer', ['null' => false])
            ->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('costo_ore', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_dirittochiamata', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_ore_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_dirittochiamata_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_documenti', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('numero_esterno', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('data', 'date', ['null' => true])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('ref_documento', 'integer', ['null' => true])
            ->addColumn('idcausalet', 'integer', ['null' => false])
            ->addColumn('idspedizione', 'integer', ['null' => false])
            ->addColumn('idporto', 'integer', ['null' => false])
            ->addColumn('idaspettobeni', 'integer', ['null' => false])
            ->addColumn('idvettore', 'integer', ['null' => false])
            ->addColumn('n_colli', 'integer', ['null' => false])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('idtipodocumento', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idstatodocumento', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idpagamento', 'integer', ['null' => false])
            ->addColumn('idbanca', 'integer', ['null' => false])
            ->addColumn('idconto', 'integer', ['null' => false])
            ->addColumn('idrivalsainps', 'integer', ['null' => false])
            ->addColumn('idritenutaacconto', 'integer', ['null' => false])
            ->addColumn('rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('ritenutaacconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('bollo', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('note', 'text', ['null' => false])
            ->addColumn('note_aggiuntive', 'text', ['null' => false])
            ->addColumn('buono_ordine', 'string', ['null' => false, 'limit' => 50])
            ->addTimestamps()
            ->addColumn('sconto_globale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto_globale', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('id_segment', 'integer', ['null' => false])
            ->addColumn('codice_xml', 'string', ['null' => true])
            ->addColumn('xml_generated_at', 'timestamp', ['null' => true])
            ->save();

        $table->addIndex(['ref_documento'], ['name' => 'ref_documento', 'unique' => false])->save();

        $table = $this->table('co_iva', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('percentuale', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('indetraibile', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('esente', 'boolean', ['null' => false])
            ->addTimestamps()
            ->addColumn('dicitura', 'string', ['null' => true])
            ->addColumn('codice_natura_fe', 'string', ['null' => true, 'limit' => 4])
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addColumn('codice', 'integer', ['null' => true])
            ->addColumn('esigibilita', 'enum', ['null' => false, 'default' => 'I', 'limit' => 1, 'values' => ['I', 'D', 'S']])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->save();

        $table->addIndex(['codice_natura_fe'], ['name' => 'codice_natura_fe', 'unique' => false])->save();

        $table = $this->table('co_movimenti', ['engine' => 'InnoDB']);
        $table->addColumn('idmastrino', 'integer', ['null' => false])
            ->addColumn('data', 'date', ['null' => true])
            ->addColumn('data_documento', 'date', ['null' => true])
            ->addColumn('iddocumento', 'integer', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('idconto', 'integer', ['null' => false])
            ->addColumn('totale', 'decimal', ['null' => true, 'precision' => 12, 'scale' => 4])
            ->addColumn('primanota', 'integer', ['null' => false,  'precision' => 3])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_movimenti_modelli', ['engine' => 'InnoDB']);
        $table->addColumn('idmastrino', 'integer', ['null' => false])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('idconto', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_ordiniservizio', ['engine' => 'InnoDB']);
        $table->addColumn('idcontratto', 'integer', ['null' => false])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('data_scadenza', 'date', ['null' => true])
            ->addColumn('copia_centrale', 'boolean', ['null' => false])
            ->addColumn('copia_cliente', 'boolean', ['null' => false])
            ->addColumn('copia_amministratore', 'boolean', ['null' => false])
            ->addColumn('funzionamento_in_sicurezza', 'boolean', ['null' => false])
            ->addColumn('stato', 'enum', ['null' => false, 'limit' => 6, 'values' => ['aperto', 'chiuso']])
            ->addTimestamps()
            ->addColumn('idimpianto', 'integer', ['null' => true])
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();
        $table->addIndex(['idimpianto'], ['name' => 'idimpianto', 'unique' => false])->save();

        $table = $this->table('co_ordiniservizio_pianificazionefatture', ['engine' => 'InnoDB']);
        $table->addColumn('idcontratto', 'integer', ['null' => false])
            ->addColumn('data_scadenza', 'date', ['null' => true])
            ->addColumn('idzona', 'integer', ['null' => false])
            ->addColumn('iddocumento', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_ordiniservizio_vociservizio', ['engine' => 'InnoDB']);
        $table->addColumn('idordineservizio', 'integer', ['null' => false])
            ->addColumn('voce', 'string', ['null' => false])
            ->addColumn('categoria', 'string', ['null' => false])
            ->addColumn('note', 'string', ['null' => false, 'limit' => 2000])
            ->addColumn('eseguito', 'boolean', ['null' => false])
            ->addColumn('presenza', 'boolean', ['null' => false])
            ->addColumn('esito', 'boolean', ['null' => false])
            ->addColumn('priorita', 'integer', ['null' => false,  'precision' => 3])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_pagamenti', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('giorno', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('num_giorni', 'integer', ['null' => false])
            ->addColumn('prc', 'integer', ['null' => false,  'precision' => 3])
            ->addTimestamps()
            ->addColumn('idconto_vendite', 'integer', ['null' => true])
            ->addColumn('idconto_acquisti', 'integer', ['null' => true])
            ->addColumn('codice_modalita_pagamento_fe', 'string', ['null' => true, 'limit' => 4])
            ->save();

        $table->addIndex(['codice_modalita_pagamento_fe'], ['name' => 'codice_modalita_pagamento_fe', 'unique' => false])->save();

        $table = $this->table('co_pianodeiconti1', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 10])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_pianodeiconti2', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 10])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('idpianodeiconti1', 'integer', ['null' => false])
            ->addColumn('dir', 'string', ['null' => false, 'limit' => 15])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_pianodeiconti3', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 10])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('idpianodeiconti2', 'integer', ['null' => false])
            ->addColumn('dir', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('can_delete', 'boolean', ['null' => false])
            ->addColumn('can_edit', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_preventivi', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('nome', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('data_bozza', 'date', ['null' => true])
            ->addColumn('data_accettazione', 'date', ['null' => true])
            ->addColumn('data_rifiuto', 'date', ['null' => true])
            ->addColumn('data_conclusione', 'date', ['null' => true])
            ->addColumn('data_pagamento', 'date', ['null' => true])
            ->addColumn('budget', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('idstato', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('validita', 'integer', ['null' => false])
            ->addColumn('tempi_consegna', 'string', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('esclusioni', 'text', ['null' => false])
            ->addColumn('idreferente', 'integer', ['null' => false])
            ->addColumn('idpagamento', 'integer', ['null' => false])
            ->addColumn('idporto', 'integer', ['null' => false])
            ->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('costo_diritto_chiamata', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('ore_lavoro', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_orario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addTimestamps()
            ->addColumn('sconto_globale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto_globale', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('master_revision', 'integer', ['null' => false])
            ->addColumn('default_revision', 'boolean', ['null' => false])
            ->save();

        $table = $this->table('co_promemoria', ['engine' => 'InnoDB']);
        $table->addColumn('idcontratto', 'integer', ['null' => false])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('data_richiesta', 'date', ['null' => true])
            ->addColumn('richiesta', 'string', ['null' => false, 'limit' => 8000])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('idimpianti', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();

        $table = $this->table('co_promemoria_articoli', ['engine' => 'InnoDB']);
        $table->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('id_promemoria', 'integer', ['null' => false])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('prezzo_acquisto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_vendita', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('abilita_serial', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('idimpianto', 'integer', ['null' => true])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_promemoria'], ['name' => 'id_riga_contratto', 'unique' => false])->save();
        $table->addIndex(['idimpianto'], ['name' => 'idimpianto', 'unique' => false])->save();

        $table = $this->table('co_promemoria_righe', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('qta', 'float', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('prezzo_vendita', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_acquisto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('id_promemoria', 'integer', ['null' => false])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_promemoria'], ['name' => 'id_riga_contratto', 'unique' => false])->save();

        $table = $this->table('co_righe_contratti', ['engine' => 'InnoDB']);
        $table->addColumn('idcontratto', 'integer', ['null' => false])
            ->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('is_descrizione', 'boolean', ['null' => false])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('subtotale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('sconto_globale', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_indetraibile', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('order', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_righe_documenti', ['engine' => 'InnoDB']);
        $table->addColumn('iddocumento', 'integer', ['null' => false])
            ->addColumn('idordine', 'integer', ['null' => false])
            ->addColumn('idddt', 'integer', ['null' => false])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('idpreventivo', 'integer', ['null' => false])
            ->addColumn('idcontratto', 'integer', ['null' => false])
            ->addColumn('ref_riga_documento', 'integer', ['null' => true])
            ->addColumn('is_descrizione', 'boolean', ['null' => false])
            ->addColumn('is_preventivo', 'boolean', ['null' => false])
            ->addColumn('is_contratto', 'boolean', ['null' => false])
            ->addColumn('idtecnico', 'integer', ['null' => false])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addColumn('idconto', 'integer', ['null' => false])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_indetraibile', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('subtotale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('sconto_globale', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('idritenutaacconto', 'integer', ['null' => false])
            ->addColumn('ritenutaacconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idrivalsainps', 'integer', ['null' => false])
            ->addColumn('rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('calcolo_ritenutaacconto', 'string', ['null' => false])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('abilita_serial', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('qta_evasa', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('order', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['ref_riga_documento'], ['name' => 'ref_riga_documento', 'unique' => false])->save();

        $table = $this->table('co_righe_preventivi', ['engine' => 'InnoDB']);
        $table->addColumn('data_evasione', 'date', ['null' => true])
            ->addColumn('idpreventivo', 'integer', ['null' => false])
            ->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('is_descrizione', 'boolean', ['null' => false])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_indetraibile', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('subtotale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('sconto_globale', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('order', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idpreventivo'], ['name' => 'idpreventivo', 'unique' => false])->save();

        $table = $this->table('co_ritenutaacconto', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('percentuale', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('indetraibile', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('esente', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_rivalsainps', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('percentuale', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('indetraibile', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('esente', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_scadenziario', ['engine' => 'InnoDB']);
        $table->addColumn('iddocumento', 'integer', ['null' => false])
            ->addColumn('tipo', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('data_emissione', 'date', ['null' => true])
            ->addColumn('scadenza', 'date', ['null' => true])
            ->addColumn('da_pagare', 'decimal', ['null' => true, 'precision' => 12, 'scale' => 4])
            ->addColumn('pagato', 'decimal', ['null' => true, 'precision' => 12, 'scale' => 4])
            ->addColumn('data_pagamento', 'date', ['null' => true])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_staticontratti', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => true, 'limit' => 100])
            ->addColumn('icona', 'string', ['null' => false])
            ->addColumn('pianificabile', 'boolean', ['null' => false])
            ->addColumn('fatturabile', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_statidocumento', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('icona', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_statipreventivi', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('icona', 'string', ['null' => false])
            ->addColumn('completato', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('annullato', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('co_tipidocumento', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('dir', 'enum', ['null' => false, 'limit' => 7, 'values' => ['entrata', 'uscita']])
            ->addColumn('reversed', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->addColumn('codice_tipo_documento_fe', 'string', ['null' => false, 'limit' => 4])
            ->save();

        $table->addIndex(['codice_tipo_documento_fe'], ['name' => 'codice_tipo_documento_fe', 'unique' => false])->save();

        $table = $this->table('dt_aspettobeni', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('dt_automezzi', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false, 'limit' => 200])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('targa', 'string', ['null' => false, 'limit' => 20])
            ->addTimestamps()
            ->save();

        $table = $this->table('dt_automezzi_tecnici', ['engine' => 'InnoDB']);
        $table->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addColumn('idtecnico', 'integer', ['null' => false])
            ->addColumn('data_inizio', 'date', ['null' => true])
            ->addColumn('data_fine', 'date', ['null' => true])
            ->addTimestamps()
            ->save();

        $table = $this->table('dt_causalet', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->save();

        $table = $this->table('dt_ddt', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'integer', ['null' => false])
            ->addColumn('numero_esterno', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('data', 'date', ['null' => true])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idcausalet', 'integer', ['null' => false])
            ->addColumn('idspedizione', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idporto', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idaspettobeni', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idvettore', 'integer', ['null' => false])
            ->addColumn('idtipoddt', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idstatoddt', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idpagamento', 'integer', ['null' => false])
            ->addColumn('idconto', 'integer', ['null' => false])
            ->addColumn('idrivalsainps', 'integer', ['null' => false])
            ->addColumn('idritenutaacconto', 'integer', ['null' => false])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('ritenutaacconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('bollo', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('n_colli', 'integer', ['null' => false])
            ->addColumn('note', 'string', ['null' => false])
            ->addColumn('note_aggiuntive', 'text', ['null' => false])
            ->addTimestamps()
            ->addColumn('sconto_globale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto_globale', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->save();

        $table = $this->table('dt_porto', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->save();

        $table = $this->table('dt_righe_ddt', ['engine' => 'InnoDB']);
        $table->addColumn('idddt', 'integer', ['null' => false])
            ->addColumn('idordine', 'integer', ['null' => false])
            ->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('is_descrizione', 'boolean', ['null' => false])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_indetraibile', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('subtotale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('sconto_globale', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('abilita_serial', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('qta_evasa', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('order', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('dt_spedizione', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('esterno', 'boolean', ['null' => false])
            ->addTimestamps()
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->save();

        $table = $this->table('dt_statiddt', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('icona', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('completato', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('dt_tipiddt', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => true, 'limit' => 100])
            ->addColumn('dir', 'enum', ['null' => true, 'limit' => 7, 'values' => ['entrata', 'uscita']])
            ->addTimestamps()
            ->save();

        $table = $this->table('fe_causali_pagamento_ritenuta', ['id' => false, 'primary_key' => ['codice'], 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 4])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 1000])
            ->addTimestamps()
            ->save();

        $table = $this->table('fe_modalita_pagamento', ['id' => false, 'primary_key' => ['codice'], 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 4])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('fe_natura', ['id' => false, 'primary_key' => ['codice'], 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 2])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('fe_regime_fiscale', ['id' => false, 'primary_key' => ['codice'], 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 4])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('fe_tipi_documento', ['id' => false, 'primary_key' => ['codice'], 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 4])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('fe_tipo_cassa', ['id' => false, 'primary_key' => ['codice'], 'engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 4])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('in_interventi', ['engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('data_richiesta', 'datetime', ['null' => false])
            ->addColumn('richiesta', 'text', ['null' => false])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('km', 'decimal', ['null' => false, 'precision' => 7, 'scale' => 2])
            ->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('nomefile', 'string', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idreferente', 'integer', ['null' => false])
            ->addColumn('idstatointervento', 'string', ['null' => false, 'limit' => 10])
            ->addColumn('informazioniaggiuntive', 'text', ['null' => false])
            ->addColumn('prezzo_ore_unitario', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addColumn('idclientefinale', 'integer', ['null' => false])
            ->addColumn('info_sede', 'string', ['null' => false])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('firma_file', 'string', ['null' => false])
            ->addColumn('firma_data', 'datetime', ['null' => false])
            ->addColumn('firma_nome', 'string', ['null' => false])
            ->addColumn('data_invio', 'datetime', ['null' => true])
            ->addTimestamps()
            ->addColumn('sconto_globale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto_globale', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('codice_cig', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('codice_cup', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('id_documento_fe', 'string', ['null' => true, 'limit' => 20])
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addColumn('id_preventivo', 'integer', ['null' => true])
            ->addColumn('id_contratto', 'integer', ['null' => true])
            ->save();

        $table->addIndex(['codice'], ['name' => 'codice', 'unique' => true])->save();
        $table->addIndex(['idanagrafica'], ['name' => 'in_interventi_ibfk_1', 'unique' => false])->save();
        $table->addIndex(['idtipointervento'], ['name' => 'in_interventi_ibfk_2', 'unique' => false])->save();
        $table->addIndex(['id_preventivo'], ['name' => 'id_preventivo', 'unique' => false])->save();
        $table->addIndex(['id_contratto'], ['name' => 'id_contratto', 'unique' => false])->save();

        $table = $this->table('in_interventi_tecnici', ['engine' => 'InnoDB']);
        $table->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('idtecnico', 'integer', ['null' => false])
            ->addColumn('orario_inizio', 'datetime', ['null' => false])
            ->addColumn('orario_fine', 'datetime', ['null' => false])
            ->addColumn('ore', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('km', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_ore_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_km_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_ore_consuntivo', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_km_consuntivo', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_dirittochiamata', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_ore_unitario_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_km_unitario_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_ore_consuntivo_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_km_consuntivo_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_dirittochiamata_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('uid', 'integer', ['null' => true])
            ->addColumn('summary', 'string', ['null' => true])
            ->addTimestamps()
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('scontokm', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('scontokm_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_scontokm', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'in_interventi_tecnici_ibfk_1', 'unique' => false])->save();
        $table->addIndex(['idtecnico'], ['name' => 'in_interventi_tecnici_ibfk_2', 'unique' => false])->save();

        $table = $this->table('in_righe_interventi', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('qta', 'float', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('prezzo_vendita', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_acquisto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addTimestamps()
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();

        $table = $this->table('in_statiintervento', ['id' => false, 'primary_key' => ['idstatointervento'], 'engine' => 'InnoDB']);
        $table->addColumn('idstatointervento', 'string', ['null' => false, 'limit' => 10])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('colore', 'string', ['null' => false, 'default' => '#FFFFFF', 'limit' => 7])
            ->addColumn('can_delete', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addColumn('completato', 'boolean', ['null' => false])
            ->addTimestamps()
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addColumn('notifica', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('id_email', 'integer', ['null' => true])
            ->addColumn('destinatari', 'string', ['null' => true])
            ->save();

        $table->addIndex(['id_email'], ['name' => 'id_email', 'unique' => false])->save();

        $table = $this->table('in_tariffe', ['engine' => 'InnoDB']);
        $table->addColumn('idtecnico', 'integer', ['null' => false])
            ->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('costo_ore', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_dirittochiamata', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_ore_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_dirittochiamata_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addTimestamps()
            ->save();

        $table = $this->table('in_tipiintervento', ['id' => false, 'primary_key' => ['idtipointervento'], 'engine' => 'InnoDB']);
        $table->addColumn('idtipointervento', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('costo_orario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_diritto_chiamata', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_orario_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_km_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('costo_diritto_chiamata_tecnico', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tempo_standard', 'decimal', ['null' => true, 'precision' => 10, 'scale' => 2])
            ->addTimestamps()
            ->save();

        $table = $this->table('in_vociservizio', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('categoria', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('mg_articoli', ['engine' => 'InnoDB']);
        $table->addColumn('codice', 'string', ['null' => false])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('abilita_serial', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('immagine', 'string', ['null' => true])
            ->addColumn('note', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('threshold_qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_acquisto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_vendita', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idiva_vendita', 'integer', ['null' => false])
            ->addColumn('gg_garanzia', 'integer', ['null' => false])
            ->addColumn('peso_lordo', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('volume', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('componente_filename', 'string', ['null' => false])
            ->addColumn('contenuto', 'text', ['null' => false])
            ->addColumn('attivo', 'boolean', ['null' => false])
            ->addTimestamps()
            ->addColumn('id_categoria', 'integer', ['null' => false])
            ->addColumn('id_sottocategoria', 'integer', ['null' => true])
            ->addColumn('servizio', 'boolean', ['null' => false])
            ->addColumn('idconto_vendita', 'integer', ['null' => true])
            ->addColumn('idconto_acquisto', 'integer', ['null' => true])
            ->save();

        $table = $this->table('mg_articoli_automezzi', ['engine' => 'InnoDB']);
        $table->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addTimestamps()
            ->save();

        $table = $this->table('mg_articoli_interventi', ['engine' => 'InnoDB']);
        $table->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('prezzo_acquisto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('prezzo_vendita', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('abilita_serial', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->addColumn('idimpianto', 'integer', ['null' => true])
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();

        $table->addIndex(['idimpianto'], ['name' => 'idimpianto', 'unique' => false])->save();

        $table = $this->table('mg_categorie', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('colore', 'string', ['null' => false])
            ->addColumn('nota', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('parent', 'integer', ['null' => true])
            ->addTimestamps()
            ->save();

        $table->addIndex(['parent'], ['name' => 'parent', 'unique' => false])->save();

        $table = $this->table('mg_listini', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('prc_guadagno', 'decimal', ['null' => false, 'precision' => 5, 'scale' => 2])
            ->addColumn('note', 'string', ['null' => false, 'limit' => 1000])
            ->addTimestamps()
            ->save();

        $table = $this->table('mg_movimenti', ['engine' => 'InnoDB']);
        $table->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('movimento', 'string', ['null' => false])
            ->addColumn('data', 'date', ['null' => false])
            ->addColumn('manuale', 'boolean', ['null' => false])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('idddt', 'integer', ['null' => false])
            ->addColumn('iddocumento', 'integer', ['null' => false])
            ->addColumn('idautomezzo', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();

        $table = $this->table('mg_prodotti', ['id' => false, 'engine' => 'InnoDB']);
        $table->addColumn('id_articolo', 'integer', ['null' => true])
            ->addColumn('lotto', 'string', ['null' => true, 'limit' => 50])
            ->addColumn('serial', 'string', ['null' => true, 'limit' => 50])
            ->addColumn('altro', 'string', ['null' => true, 'limit' => 50])
            ->addTimestamps()
            ->addColumn('id_riga_documento', 'integer', ['null' => true])
            ->addColumn('id_riga_ordine', 'integer', ['null' => true])
            ->addColumn('id_riga_ddt', 'integer', ['null' => true])
            ->addColumn('id_riga_intervento', 'integer', ['null' => true])
            ->addColumn('dir', 'enum', ['null' => true, 'default' => 'uscita', 'limit' => 7, 'values' => ['entrata', 'uscita']])
            ->save();

        $table->addIndex(['id_riga_documento'], ['name' => 'id_riga_documento', 'unique' => false])->save();

        $table->addIndex(['id_riga_ordine'], ['name' => 'id_riga_ordine', 'unique' => false])->save();

        $table->addIndex(['id_riga_ddt'], ['name' => 'id_riga_ddt', 'unique' => false])->save();

        $table->addIndex(['id_riga_intervento'], ['name' => 'id_riga_intervento', 'unique' => false])->save();

        $table->addIndex(['id_articolo'], ['name' => 'id_articolo', 'unique' => false])->save();

        $table = $this->table('mg_unitamisura', ['engine' => 'InnoDB']);
        $table->addColumn('valore', 'string', ['null' => false, 'limit' => 20])
            ->addTimestamps()
            ->save();

        $table = $this->table('my_componenti_interventi', ['id' => false, 'engine' => 'InnoDB']);
        $table->addColumn('id_intervento', 'integer', ['null' => true])
            ->addColumn('id_componente', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_intervento'], ['name' => 'id_intervento', 'unique' => false])->save();

        $table->addIndex(['id_componente'], ['name' => 'id_componente', 'unique' => false])->save();

        $table = $this->table('my_impianti', ['engine' => 'InnoDB']);
        $table->addColumn('matricola', 'string', ['null' => false, 'limit' => 25])
            ->addColumn('nome', 'string', ['null' => false])
            ->addColumn('descrizione', 'string', ['null' => false, 'limit' => 5000])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('id_categoria', 'integer', ['null' => true])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('data', 'date', ['null' => false])
            ->addColumn('idtecnico', 'integer', ['null' => false])
            ->addColumn('ubicazione', 'string', ['null' => false])
            ->addColumn('scala', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('piano', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('occupante', 'string', ['null' => false])
            ->addColumn('proprietario', 'string', ['null' => false])
            ->addColumn('palazzo', 'string', ['null' => false])
            ->addColumn('interno', 'string', ['null' => false])
            ->addColumn('immagine', 'string', ['null' => true])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_categoria'], ['name' => 'id_categoria', 'unique' => false])->save();

        $table = $this->table('my_impianti_categorie', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('colore', 'string', ['null' => false])
            ->addColumn('nota', 'string', ['null' => false, 'limit' => 1000])
            ->addTimestamps()
            ->save();

        $table = $this->table('my_impianti_contratti', ['id' => false, 'engine' => 'InnoDB']);
        $table->addColumn('idcontratto', 'string', ['null' => false, 'limit' => 25])
            ->addTimestamps()
            ->addColumn('idimpianto', 'integer', ['null' => true])
            ->save();

        $table->addIndex(['idimpianto'], ['name' => 'idimpianto', 'unique' => false])->save();

        $table = $this->table('my_impianti_interventi', ['id' => false, 'engine' => 'InnoDB']);
        $table->addColumn('idintervento', 'integer', ['null' => true])
            ->addTimestamps()
            ->addColumn('idimpianto', 'integer', ['null' => true])
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();

        $table->addIndex(['idimpianto'], ['name' => 'idimpianto', 'unique' => false])->save();

        $table = $this->table('my_impianto_componenti', ['engine' => 'InnoDB']);
        $table->addColumn('idsostituto', 'integer', ['null' => true])
            ->addColumn('idintervento', 'integer', ['null' => true])
            ->addColumn('nome', 'string', ['null' => false])
            ->addColumn('data', 'date', ['null' => true])
            ->addColumn('data_sostituzione', 'date', ['null' => true])
            ->addColumn('filename', 'string', ['null' => false])
            ->addColumn('contenuto', 'text', ['null' => false])
            ->addTimestamps()
            ->addColumn('idimpianto', 'integer', ['null' => true])
            ->save();

        $table->addIndex(['idintervento'], ['name' => 'idintervento', 'unique' => false])->save();

        $table->addIndex(['idimpianto'], ['name' => 'idimpianto', 'unique' => false])->save();

        $table->addIndex(['idsostituto'], ['name' => 'idsostituto', 'unique' => false])->save();

        $table = $this->table('or_ordini', ['engine' => 'InnoDB']);
        $table->addColumn('numero', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('numero_esterno', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('data', 'date', ['null' => true])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idsede', 'integer', ['null' => false])
            ->addColumn('idtipoordine', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idstatoordine', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('idpagamento', 'integer', ['null' => false])
            ->addColumn('idconto', 'integer', ['null' => false])
            ->addColumn('idrivalsainps', 'integer', ['null' => false])
            ->addColumn('idritenutaacconto', 'integer', ['null' => false])
            ->addColumn('rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_rivalsainps', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('ritenutaacconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('bollo', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->addColumn('note', 'string', ['null' => false])
            ->addColumn('note_aggiuntive', 'text', ['null' => false])
            ->addTimestamps()
            ->addColumn('sconto_globale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto_globale', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->save();

        $table = $this->table('or_righe_ordini', ['engine' => 'InnoDB']);
        $table->addColumn('data_evasione', 'date', ['null' => true])
            ->addColumn('idordine', 'integer', ['null' => false])
            ->addColumn('idarticolo', 'integer', ['null' => false])
            ->addColumn('idpreventivo', 'integer', ['null' => false])
            ->addColumn('is_descrizione', 'boolean', ['null' => false])
            ->addColumn('idiva', 'integer', ['null' => false])
            ->addColumn('desc_iva', 'string', ['null' => false])
            ->addColumn('idagente', 'integer', ['null' => false])
            ->addColumn('iva', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('iva_indetraibile', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('descrizione', 'text', ['null' => false])
            ->addColumn('subtotale', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('sconto_unitario', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('tipo_sconto', 'enum', ['null' => false, 'default' => 'UNT', 'limit' => 3, 'values' => ['UNT', 'PRC']])
            ->addColumn('sconto_globale', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('um', 'string', ['null' => false, 'limit' => 20])
            ->addColumn('abilita_serial', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('qta', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('qta_evasa', 'decimal', ['null' => false, 'precision' => 12, 'scale' => 4])
            ->addColumn('order', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('or_statiordine', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('annullato', 'boolean', ['null' => false])
            ->addColumn('icona', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('completato', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('or_tipiordine', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false, 'limit' => 100])
            ->addColumn('dir', 'enum', ['null' => false, 'limit' => 7, 'values' => ['entrata', 'uscita']])
            ->addTimestamps()
            ->save();

        $table = $this->table('updates', ['engine' => 'InnoDB']);
        $table->addColumn('directory', 'string', ['null' => true])
            ->addColumn('version', 'string', ['null' => false])
            ->addColumn('sql', 'boolean', ['null' => false])
            ->addColumn('script', 'boolean', ['null' => false])
            ->addColumn('done', 'integer', ['null' => true])
            ->save();

        $table = $this->table('zz_documenti', ['engine' => 'InnoDB']);
        $table->addColumn('idcategoria', 'integer', ['null' => false])
            ->addColumn('nome', 'string', ['null' => false])
            ->addColumn('data', 'date', ['null' => true])
            ->addTimestamps()
            ->save();

        $table = $this->table('zz_documenti_categorie', ['engine' => 'InnoDB']);
        $table->addColumn('descrizione', 'string', ['null' => false])
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addTimestamps()
            ->save();

        $table = $this->table('zz_email_print', ['engine' => 'InnoDB']);
        $table->addColumn('id_email', 'integer', ['null' => false])
            ->addColumn('id_print', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_email'], ['name' => 'id_email', 'unique' => false])->save();

        $table->addIndex(['id_print'], ['name' => 'id_print', 'unique' => false])->save();

        $table = $this->table('zz_emails', ['engine' => 'InnoDB']);
        $table->addColumn('id_module', 'integer', ['null' => false])
            ->addColumn('id_smtp', 'integer', ['null' => false])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('icon', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('subject', 'string', ['null' => false])
            ->addColumn('reply_to', 'string', ['null' => false])
            ->addColumn('cc', 'string', ['null' => false])
            ->addColumn('bcc', 'string', ['null' => false])
            ->addColumn('body', 'text', ['null' => false])
            ->addColumn('read_notify', 'boolean', ['null' => false])
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->save();

        $table->addIndex(['id_module'], ['name' => 'id_module', 'unique' => false])->save();

        $table->addIndex(['id_smtp'], ['name' => 'id_smtp', 'unique' => false])->save();

        $table = $this->table('zz_field_record', ['engine' => 'InnoDB']);
        $table->addColumn('id_field', 'integer', ['null' => false])
            ->addColumn('id_record', 'integer', ['null' => false])
            ->addColumn('value', 'text', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_field'], ['name' => 'id_field', 'unique' => false])->save();

        $table = $this->table('zz_fields', ['engine' => 'InnoDB']);
        $table->addColumn('id_module', 'integer', ['null' => true])
            ->addColumn('id_plugin', 'integer', ['null' => true])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('html_name', 'string', ['null' => false])
            ->addColumn('content', 'text', ['null' => false])
            ->addColumn('options', 'text', ['null' => true])
            ->addColumn('order', 'integer', ['null' => false])
            ->addColumn('on_add', 'boolean', ['null' => false])
            ->addColumn('top', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_module'], ['name' => 'id_module', 'unique' => false])->save();

        $table->addIndex(['id_plugin'], ['name' => 'id_plugin', 'unique' => false])->save();

        $table = $this->table('zz_files', ['engine' => 'InnoDB']);
        $table->addColumn('name', 'string', ['null' => false])
            ->addColumn('filename', 'string', ['null' => false])
            ->addColumn('original', 'string', ['null' => false])
            ->addColumn('category', 'string', ['null' => true, 'limit' => 100])
            ->addColumn('id_module', 'integer', ['null' => true])
            ->addColumn('id_plugin', 'integer', ['null' => true])
            ->addColumn('id_record', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('zz_group_module', ['engine' => 'InnoDB']);
        $table->addColumn('idgruppo', 'integer', ['null' => false])
            ->addColumn('idmodule', 'integer', ['null' => false])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('clause', 'string', ['null' => false, 'limit' => 5000])
            ->addColumn('position', 'enum', ['null' => false, 'default' => 'WHR', 'limit' => 3, 'values' => ['WHR', 'HVN']])
            ->addColumn('enabled', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idmodule'], ['name' => 'idmodule', 'unique' => false])->save();

        $table->addIndex(['idgruppo'], ['name' => 'idgruppo', 'unique' => false])->save();

        $table = $this->table('zz_group_view', ['id' => false, 'primary_key' => ['id_gruppo', 'id_vista'], 'engine' => 'InnoDB']);
        $table->addColumn('id_gruppo', 'integer', ['null' => false])
            ->addColumn('id_vista', 'integer', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_vista'], ['name' => 'id_vista', 'unique' => false])->save();

        $table = $this->table('zz_groups', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('editable', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table = $this->table('zz_logs', ['engine' => 'InnoDB']);
        $table->addColumn('id_utente', 'integer', ['null' => true])
            ->addColumn('username', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('stato', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('ip', 'string', ['null' => false, 'limit' => 15])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_utente'], ['name' => 'id_utente', 'unique' => false])->save();

        $table = $this->table('zz_modules', ['engine' => 'InnoDB']);
        $table->addColumn('name', 'string', ['null' => false])
            ->addColumn('title', 'string', ['null' => false])
            ->addColumn('directory', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('options', 'text', ['null' => false])
            ->addColumn('options2', 'text', ['null' => false])
            ->addColumn('icon', 'string', ['null' => false])
            ->addColumn('version', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('compatibility', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('order', 'integer', ['null' => false])
            ->addColumn('parent', 'integer', ['null' => true])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('enabled', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['parent'], ['name' => 'parent', 'unique' => false])->save();

        $table = $this->table('zz_operations', ['id' => false, 'engine' => 'InnoDB']);
        $table->addColumn('id_module', 'integer', ['null' => true])
            ->addColumn('id_plugin', 'integer', ['null' => true])
            ->addColumn('id_email', 'integer', ['null' => true])
            ->addColumn('id_record', 'integer', ['null' => true])
            ->addColumn('id_utente', 'integer', ['null' => false])
            ->addColumn('op', 'string', ['null' => false])
            ->addColumn('options', 'text', ['null' => true])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_module'], ['name' => 'id_module', 'unique' => false])->save();

        $table->addIndex(['id_plugin'], ['name' => 'id_plugin', 'unique' => false])->save();

        $table->addIndex(['id_email'], ['name' => 'id_email', 'unique' => false])->save();

        $table->addIndex(['id_utente'], ['name' => 'id_utente', 'unique' => false])->save();

        $table = $this->table('zz_permissions', ['engine' => 'InnoDB']);
        $table->addColumn('idgruppo', 'integer', ['null' => false])
            ->addColumn('idmodule', 'integer', ['null' => false])
            ->addColumn('permessi', 'enum', ['null' => false, 'limit' => 2, 'values' => ['-', 'r', 'rw']])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idmodule'], ['name' => 'idmodule', 'unique' => false])->save();

        $table->addIndex(['idgruppo'], ['name' => 'idgruppo', 'unique' => false])->save();

        $table = $this->table('zz_plugins', ['engine' => 'InnoDB']);
        $table->addColumn('name', 'string', ['null' => false])
            ->addColumn('title', 'string', ['null' => false])
            ->addColumn('idmodule_from', 'integer', ['null' => false])
            ->addColumn('idmodule_to', 'integer', ['null' => false])
            ->addColumn('position', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('script', 'string', ['null' => false])
            ->addColumn('enabled', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('order', 'integer', ['null' => false])
            ->addColumn('compatibility', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('version', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('options2', 'text', ['null' => true])
            ->addColumn('options', 'text', ['null' => true])
            ->addColumn('directory', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('help', 'string', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idmodule_from'], ['name' => 'idmodule_from', 'unique' => false])->save();

        $table->addIndex(['idmodule_to'], ['name' => 'idmodule_to', 'unique' => false])->save();

        $table = $this->table('zz_prints', ['engine' => 'InnoDB']);
        $table->addColumn('id_module', 'integer', ['null' => false])
            ->addColumn('is_record', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('title', 'string', ['null' => false])
            ->addColumn('directory', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('previous', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('options', 'text', ['null' => false])
            ->addColumn('icon', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('version', 'string', ['null' => false, 'limit' => 15])
            ->addColumn('compatibility', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('order', 'integer', ['null' => false])
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('enabled', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_module'], ['name' => 'id_module', 'unique' => false])->save();

        $table = $this->table('zz_segments', ['engine' => 'InnoDB']);
        $table->addColumn('id_module', 'integer', ['null' => false])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('clause', 'text', ['null' => false])
            ->addColumn('position', 'enum', ['null' => false, 'default' => 'WHR', 'limit' => 3, 'values' => ['WHR', 'HVN']])
            ->addColumn('pattern', 'string', ['null' => false])
            ->addColumn('note', 'text', ['null' => false])
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('predefined_accredito', 'boolean', ['null' => false])
            ->addColumn('predefined_addebito', 'boolean', ['null' => false])
            ->addTimestamps()
            ->addColumn('is_fiscale', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->save();

        $table = $this->table('zz_semaphores', ['id' => false, 'engine' => 'InnoDB']);
        $table->addColumn('id_utente', 'integer', ['null' => false])
            ->addColumn('posizione', 'string', ['null' => false])
            ->addColumn('updated', 'datetime', ['null' => true])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_utente'], ['name' => 'id_utente', 'unique' => false])->save();

        $table = $this->table('zz_settings', ['engine' => 'InnoDB']);
        $table->addColumn('nome', 'string', ['null' => false])
            ->addColumn('valore', 'text', ['null' => false])
            ->addColumn('tipo', 'string', ['null' => false, 'limit' => 1000])
            ->addColumn('editable', 'boolean', ['null' => false])
            ->addColumn('sezione', 'string', ['null' => false, 'limit' => 100])
            ->addTimestamps()
            ->addColumn('order', 'integer', ['null' => true])
            ->save();

        $table = $this->table('zz_smtps', ['engine' => 'InnoDB']);
        $table->addColumn('name', 'string', ['null' => false])
            ->addColumn('note', 'string', ['null' => false])
            ->addColumn('server', 'string', ['null' => false])
            ->addColumn('port', 'string', ['null' => false])
            ->addColumn('username', 'string', ['null' => false])
            ->addColumn('password', 'string', ['null' => false])
            ->addColumn('from_name', 'string', ['null' => false])
            ->addColumn('from_address', 'string', ['null' => false])
            ->addColumn('encryption', 'enum', ['null' => false, 'limit' => 3, 'values' => ['', 'tls', 'ssl']])
            ->addColumn('pec', 'boolean', ['null' => false])
            ->addColumn('predefined', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('deleted_at', 'timestamp', ['null' => true])
            ->addTimestamps()
            ->save();

        $table = $this->table('zz_tokens', ['engine' => 'InnoDB']);
        $table->addColumn('id_utente', 'integer', ['null' => false])
            ->addColumn('token', 'string', ['null' => false])
            ->addColumn('descrizione', 'string', ['null' => true])
            ->addColumn('enabled', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_utente'], ['name' => 'id_utente', 'unique' => false])->save();

        $table = $this->table('zz_users', ['engine' => 'InnoDB']);
        $table->addColumn('username', 'string', ['null' => false])
            ->addColumn('password', 'string', ['null' => false])
            ->addColumn('email', 'string', ['null' => false, 'limit' => 50])
            ->addColumn('idanagrafica', 'integer', ['null' => false])
            ->addColumn('idgruppo', 'integer', ['null' => false])
            ->addColumn('enabled', 'boolean', ['null' => false])
            ->addTimestamps()
            ->save();

        $table->addIndex(['idgruppo'], ['name' => 'idgruppo', 'unique' => false])->save();

        $table = $this->table('zz_views', ['engine' => 'InnoDB']);
        $table->addColumn('id_module', 'integer', ['null' => false])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('query', 'text', ['null' => true])
            ->addColumn('order', 'integer', ['null' => false,  'precision' => 3])
            ->addColumn('search', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addColumn('slow', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('format', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('search_inside', 'string', ['null' => true])
            ->addColumn('order_by', 'string', ['null' => true])
            ->addColumn('visible', 'boolean', ['null' => false, 'default' => '1',  'precision' => 3])
            ->addColumn('summable', 'boolean', ['null' => false, 'default' => '0'])
            ->addColumn('default', 'boolean', ['null' => false, 'default' => '0'])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_module'], ['name' => 'id_module', 'unique' => false])->save();

        $table = $this->table('zz_widgets', ['engine' => 'InnoDB']);
        $table->addColumn('name', 'string', ['null' => true])
            ->addColumn('type', 'enum', ['null' => true, 'limit' => 6, 'values' => ['stats', 'chart', 'custom', 'print']])
            ->addColumn('id_module', 'integer', ['null' => false])
            ->addColumn('location', 'enum', ['null' => true, 'limit' => 16, 'values' => ['controller_top', 'controller_right', 'editor_top', 'editor_right']])
            ->addColumn('class', 'string', ['null' => true, 'limit' => 50])
            ->addColumn('query', 'text', ['null' => true])
            ->addColumn('bgcolor', 'string', ['null' => true, 'limit' => 7])
            ->addColumn('icon', 'string', ['null' => true])
            ->addColumn('print_link', 'string', ['null' => true])
            ->addColumn('more_link', 'string', ['null' => true, 'limit' => 5000])
            ->addColumn('more_link_type', 'enum', ['null' => true, 'limit' => 10, 'values' => ['link', 'popup', 'javascript']])
            ->addColumn('php_include', 'string', ['null' => true])
            ->addColumn('text', 'text', ['null' => true])
            ->addColumn('enabled', 'boolean', ['null' => true,  'precision' => 3])
            ->addColumn('order', 'integer', ['null' => true])
            ->addColumn('help', 'string', ['null' => true])
            ->addTimestamps()
            ->save();

        $table->addIndex(['id_module'], ['name' => 'id_module', 'unique' => false])->save();
    }
}
