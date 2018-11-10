<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtStatiddtTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_statiddt', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100);
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
        $this->schema->drop('dt_statiddt');
    }
}
