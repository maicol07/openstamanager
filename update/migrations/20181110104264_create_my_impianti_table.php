<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyImpiantiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('my_impianti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('matricola', 25);
            $table->string('nome');
            $table->string('descrizione', 5000);
            $table->integer('idanagrafica');
            $table->integer('id_categoria')->nullable()->index('id_categoria');
            $table->integer('idsede');
            $table->date('data');
            $table->integer('idtecnico');
            $table->string('ubicazione');
            $table->string('scala', 50);
            $table->string('piano', 50);
            $table->string('occupante');
            $table->string('proprietario');
            $table->string('palazzo');
            $table->string('interno');
            $table->string('immagine')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('my_impianti');
    }
}
