<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyComponentiInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('my_componenti_interventi', function (Blueprint $table) {
            $table->integer('id_intervento')->nullable()->index('id_intervento');
            $table->integer('id_componente')->index('id_componente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('my_componenti_interventi');
    }
}
