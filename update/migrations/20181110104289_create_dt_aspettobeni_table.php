<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtAspettobeniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_aspettobeni', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_aspettobeni');
    }
}
