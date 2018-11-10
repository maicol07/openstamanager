<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeTipoCassaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('fe_tipo_cassa', function (Blueprint $table) {
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
        $this->schema->drop('fe_tipo_cassa');
    }
}
