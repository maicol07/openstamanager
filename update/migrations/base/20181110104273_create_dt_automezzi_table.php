<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtAutomezziTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_automezzi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome', 200);
            $table->string('descrizione', 1000);
            $table->string('targa', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_automezzi');
    }
}
