<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeTipiDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('fe_tipi_documento', function (Blueprint $table) {
            $table->string('codice', 4)->primary();
            $table->string('descrizione');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('fe_tipi_documento');
    }
}
