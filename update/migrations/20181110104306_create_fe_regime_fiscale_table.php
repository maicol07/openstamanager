<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeRegimeFiscaleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('fe_regime_fiscale', function (Blueprint $table) {
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
        $this->schema->drop('fe_regime_fiscale');
    }
}
