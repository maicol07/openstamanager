<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoMovimentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_movimenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idmastrino');
            $table->date('data')->nullable();
            $table->date('data_documento')->nullable();
            $table->integer('iddocumento');
            $table->integer('idanagrafica');
            $table->text('descrizione', 65535);
            $table->integer('idconto');
            $table->decimal('totale', 12, 4)->nullable();
            $table->boolean('primanota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_movimenti');
    }
}
