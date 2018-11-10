<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPianodeiconti3Table extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_pianodeiconti3', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 10);
            $table->string('descrizione', 100);
            $table->integer('idpianodeiconti2');
            $table->string('dir', 15);
            $table->boolean('can_delete');
            $table->boolean('can_edit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_pianodeiconti3');
    }
}
