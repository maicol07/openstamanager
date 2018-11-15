<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnTipianagraficheTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_tipianagrafiche', function (Blueprint $table) {
            $table->integer('idtipoanagrafica', true);
            $table->string('descrizione');
            $table->boolean('default')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_tipianagrafiche');
    }
}
