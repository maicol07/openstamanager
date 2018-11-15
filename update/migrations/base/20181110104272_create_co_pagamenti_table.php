<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPagamentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_pagamenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione');
            $table->boolean('giorno');
            $table->integer('num_giorni');
            $table->boolean('prc');
            $table->timestamps();
            $table->integer('idconto_vendite')->nullable();
            $table->integer('idconto_acquisti')->nullable();
            $table->string('codice_modalita_pagamento_fe', 4)->nullable()->index('codice_modalita_pagamento_fe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_pagamenti');
    }
}
