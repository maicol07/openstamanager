<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyImpiantiInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('my_impianti_interventi', function (Blueprint $table) {
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->timestamps();
            $table->integer('idimpianto')->nullable()->index('idimpianto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('my_impianti_interventi');
    }
}
