<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoTipidocumentoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_tipidocumento', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100);
            $table->enum('dir', ['entrata', 'uscita']);
            $table->boolean('reversed')->default(0);
            $table->timestamps();
            $table->string('codice_tipo_documento_fe', 4)->index('codice_tipo_documento_fe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_tipidocumento');
    }
}
