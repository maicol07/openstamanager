<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzSemaphoresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_semaphores', function (Blueprint $table) {
            $table->integer('id_utente')->index('id_utente');
            $table->string('posizione');
            $table->dateTime('updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_semaphores');
    }
}
