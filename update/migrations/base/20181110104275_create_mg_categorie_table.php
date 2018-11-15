<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgCategorieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_categorie', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('colore');
            $table->string('nota', 1000);
            $table->integer('parent')->nullable()->index('parent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_categorie');
    }
}
