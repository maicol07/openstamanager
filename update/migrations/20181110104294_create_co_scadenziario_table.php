<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoScadenziarioTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_scadenziario', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('iddocumento');
            $table->string('tipo', 50);
            $table->date('data_emissione')->nullable();
            $table->date('scadenza')->nullable();
            $table->decimal('da_pagare', 12, 4)->nullable();
            $table->decimal('pagato', 12, 4)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_scadenziario');
    }
}
