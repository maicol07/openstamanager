<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_interventi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codice', 25)->unique('codice');
            $table->dateTime('data_richiesta');
            $table->text('richiesta', 65535);
            $table->text('descrizione', 65535);
            $table->decimal('km', 7);
            $table->string('idtipointervento', 25)->index('in_interventi_ibfk_2');
            $table->string('nomefile');
            $table->integer('idanagrafica')->index('in_interventi_ibfk_1');
            $table->integer('idreferente');
            $table->string('idstatointervento', 10);
            $table->text('informazioniaggiuntive', 65535);
            $table->decimal('prezzo_ore_unitario', 10);
            $table->integer('idsede');
            $table->integer('idautomezzo');
            $table->integer('idclientefinale');
            $table->string('info_sede');
            $table->enum('tipo_sconto', ['UNT', 'PRC'])->default('UNT');
            $table->string('firma_file');
            $table->dateTime('firma_data');
            $table->string('firma_nome');
            $table->dateTime('data_invio')->nullable();
            $table->timestamps();
            $table->decimal('sconto_globale', 12, 4);
            $table->enum('tipo_sconto_globale', ['UNT', 'PRC'])->default('UNT');
            $table->string('codice_cig', 15)->nullable();
            $table->string('codice_cup', 15)->nullable();
            $table->string('id_documento_fe', 20)->nullable();
            $table->softDeletes();
            $table->integer('id_preventivo')->nullable()->index('id_preventivo');
            $table->integer('id_contratto')->nullable()->index('id_contratto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_interventi');
    }
}
