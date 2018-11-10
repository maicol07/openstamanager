<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyImpiantoComponentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('my_impianto_componenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idsostituto')->nullable()->index('idsostituto');
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->string('nome');
            $table->date('data')->nullable();
            $table->date('data_sostituzione')->nullable();
            $table->string('filename');
            $table->text('contenuto', 65535);
            $table->timestamps();
            $table->integer('idimpianto')->nullable()->index('idimpianto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('my_impianto_componenti');
    }
}
