<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPianodeiconti2Table extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_pianodeiconti2', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 10);
            $table->string('descrizione', 100);
            $table->integer('idpianodeiconti1');
            $table->string('dir', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_pianodeiconti2');
    }
}
