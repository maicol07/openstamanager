<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoContrattiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_contratti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 50);
            $table->string('nome', 100);
            $table->integer('idagente');
            $table->date('data_bozza')->nullable();
            $table->date('data_accettazione')->nullable();
            $table->date('data_rifiuto')->nullable();
            $table->date('data_conclusione')->nullable();
            $table->boolean('rinnovabile');
            $table->smallInteger('giorni_preavviso_rinnovo');
            $table->decimal('budget', 12, 4);
            $table->text('descrizione', 65535)->nullable();
            $table->boolean('idstato')->nullable();
            $table->integer('idreferente')->nullable();
            $table->integer('validita')->nullable();
            $table->text('esclusioni', 65535);
            $table->integer('idanagrafica');
            $table->integer('idsede');
            $table->integer('idpagamento');
            $table->decimal('costo_diritto_chiamata', 12, 4);
            $table->decimal('ore_lavoro', 12, 4);
            $table->decimal('costo_orario', 12, 4);
            $table->decimal('costo_km', 12, 4);
            $table->timestamps();
            $table->integer('idcontratto_prev');
            $table->decimal('sconto_globale', 12, 4);
            $table->enum('tipo_sconto_globale', ['UNT', 'PRC'])->default('UNT');
            $table->string('codice_cig', 15)->nullable();
            $table->string('codice_cup', 15)->nullable();
            $table->string('id_documento_fe', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_contratti');
    }
}
