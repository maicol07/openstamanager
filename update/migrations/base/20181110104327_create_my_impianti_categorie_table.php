<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyImpiantiCategorieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('my_impianti_categorie', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('colore');
            $table->string('nota', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('my_impianti_categorie');
    }
}
