<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyImpiantiContrattiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('my_impianti_contratti', function (Blueprint $table) {
            $table->string('idcontratto', 25);
            $table->timestamps();
            $table->integer('idimpianto')->nullable()->index('idimpianto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('my_impianti_contratti');
    }
}
