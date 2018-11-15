<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoStatidocumentoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_statidocumento', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100);
            $table->string('icona');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_statidocumento');
    }
}
