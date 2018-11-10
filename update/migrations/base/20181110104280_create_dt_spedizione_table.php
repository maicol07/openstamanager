<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtSpedizioneTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_spedizione', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione');
            $table->boolean('esterno');
            $table->timestamps();
            $table->boolean('predefined')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_spedizione');
    }
}
