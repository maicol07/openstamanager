<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPreventiviTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_preventivi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 50);
            $table->string('nome', 100);
            $table->integer('idagente');
            $table->date('data_bozza')->nullable();
            $table->date('data_accettazione')->nullable();
            $table->date('data_rifiuto')->nullable();
            $table->date('data_conclusione')->nullable();
            $table->date('data_pagamento')->nullable();
            $table->decimal('budget', 12, 4);
            $table->text('descrizione', 65535);
            $table->boolean('idstato');
            $table->integer('validita');
            $table->string('tempi_consegna');
            $table->integer('idanagrafica');
            $table->text('esclusioni', 65535);
            $table->integer('idreferente');
            $table->integer('idpagamento');
            $table->integer('idporto');
            $table->string('idtipointervento', 25);
            $table->integer('idiva');
            $table->decimal('costo_diritto_chiamata', 12, 4);
            $table->decimal('ore_lavoro', 12, 4);
            $table->decimal('costo_orario', 12, 4);
            $table->decimal('costo_km', 12, 4);
            $table->timestamps();
            $table->decimal('sconto_globale', 12, 4);
            $table->enum('tipo_sconto_globale', ['UNT', 'PRC'])->default('UNT');
            $table->integer('master_revision');
            $table->boolean('default_revision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_preventivi');
    }
}
