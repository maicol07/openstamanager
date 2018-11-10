<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtAutomezziTecniciTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_automezzi_tecnici', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idautomezzo');
            $table->integer('idtecnico');
            $table->date('data_inizio')->nullable();
            $table->date('data_fine')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_automezzi_tecnici');
    }
}
