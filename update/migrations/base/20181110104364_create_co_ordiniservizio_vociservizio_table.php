<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoOrdiniservizioVociservizioTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_ordiniservizio_vociservizio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idordineservizio');
            $table->string('voce');
            $table->string('categoria');
            $table->string('note', 2000);
            $table->boolean('eseguito');
            $table->boolean('presenza');
            $table->boolean('esito');
            $table->boolean('priorita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_ordiniservizio_vociservizio');
    }
}
