<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrTipiordineTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('or_tipiordine', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100);
            $table->enum('dir', ['entrata', 'uscita']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('or_tipiordine');
    }
}
