<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnZoneTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_zone', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('descrizione', 2000);
            $table->boolean('default')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_zone');
    }
}
