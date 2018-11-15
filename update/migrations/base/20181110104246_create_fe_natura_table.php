<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeNaturaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('fe_natura', function (Blueprint $table) {
            $table->string('codice', 2)->primary();
            $table->text('descrizione', 65535);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('fe_natura');
    }
}
