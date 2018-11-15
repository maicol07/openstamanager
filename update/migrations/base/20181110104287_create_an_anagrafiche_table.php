<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnAnagraficheTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_anagrafiche', function (Blueprint $table) {
            $table->integer('idanagrafica', true);
            $table->string('codice', 20);
            $table->string('ragione_sociale');
            $table->enum('tipo', ['', 'Azienda', 'Privato', 'Ente pubblico']);
            $table->string('piva', 15);
            $table->string('codice_fiscale', 16);
            $table->string('capitale_sociale');
            $table->date('data_nascita');
            $table->string('luogo_nascita');
            $table->enum('sesso', ['', 'M', 'F']);
            $table->string('indirizzo');
            $table->string('indirizzo2');
            $table->string('citta');
            $table->string('cap', 10);
            $table->string('provincia', 2);
            $table->decimal('km', 10);
            $table->integer('id_nazione')->nullable()->index('id_nazione');
            $table->string('telefono', 50);
            $table->string('fax', 50);
            $table->string('cellulare', 50);
            $table->string('email');
            $table->string('pec');
            $table->string('sitoweb');
            $table->string('note');
            $table->string('codiceri', 15);
            $table->string('codicerea', 15);
            $table->string('appoggiobancario');
            $table->string('filiale', 100);
            $table->string('codiceiban', 40);
            $table->string('bic', 25);
            $table->string('diciturafissafattura');
            $table->integer('idpagamento_vendite')->nullable();
            $table->integer('idpagamento_acquisti')->nullable();
            $table->integer('idlistino_vendite')->nullable();
            $table->integer('idlistino_acquisti')->nullable();
            $table->integer('idiva_vendite')->nullable();
            $table->integer('idiva_acquisti')->nullable();
            $table->integer('id_ritenuta_acconto_vendite')->nullable();
            $table->integer('id_ritenuta_acconto_acquisti')->nullable();
            $table->integer('idsede_fatturazione');
            $table->integer('idconto_cliente');
            $table->integer('idbanca_vendite');
            $table->integer('idbanca_acquisti');
            $table->integer('idconto_fornitore');
            $table->string('settore');
            $table->string('marche', 5000);
            $table->integer('dipendenti');
            $table->integer('macchine');
            $table->integer('idagente');
            $table->integer('idrelazione');
            $table->boolean('agentemaster');
            $table->integer('idzona');
            $table->string('foro_competenza');
            $table->string('nome_cognome');
            $table->string('iscrizione_tribunale', 2);
            $table->string('cciaa', 25);
            $table->string('cciaa_citta', 100);
            $table->string('n_alboartigiani', 25)->nullable();
            $table->string('colore', 7)->default('#FFFFFF');
            $table->timestamps();
            $table->string('idtipointervento_default', 25);
            $table->string('gaddress')->nullable();
            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();
            $table->softDeletes();
            $table->string('codice_destinatario', 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_anagrafiche');
    }
}
