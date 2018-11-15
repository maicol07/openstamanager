<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeModalitaPagamentoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('fe_modalita_pagamento', function (Blueprint $table) {
            $table->string('codice', 4)->primary();
            $table->string('descrizione');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('fe_modalita_pagamento');
    }
}
