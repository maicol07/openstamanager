<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeCausaliPagamentoRitenutaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('fe_causali_pagamento_ritenuta', function (Blueprint $table) {
            $table->string('codice', 4)->primary();
            $table->string('descrizione', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('fe_causali_pagamento_ritenuta');
    }
}
