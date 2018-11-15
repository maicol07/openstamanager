<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoMovimentiModelliTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_movimenti_modelli', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idmastrino');
            $table->text('descrizione', 65535);
            $table->integer('idconto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_movimenti_modelli');
    }
}
