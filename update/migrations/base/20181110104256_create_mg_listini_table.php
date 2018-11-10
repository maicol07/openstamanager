<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgListiniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_listini', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->decimal('prc_guadagno', 5);
            $table->string('note', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_listini');
    }
}
