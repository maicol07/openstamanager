<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInVociservizioTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_vociservizio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione');
            $table->string('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_vociservizio');
    }
}
