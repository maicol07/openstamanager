<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoBancheTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_banche', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('filiale');
            $table->string('iban', 32);
            $table->string('bic', 11);
            $table->integer('id_pianodeiconti3')->nullable();
            $table->text('note', 65535);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_banche');
    }
}
