<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPianodeiconti1Table extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_pianodeiconti1', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 10);
            $table->string('descrizione', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_pianodeiconti1');
    }
}
