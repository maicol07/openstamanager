<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrStatiordineTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('or_statiordine', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100);
            $table->boolean('annullato');
            $table->string('icona', 100);
            $table->boolean('completato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('or_statiordine');
    }
}
