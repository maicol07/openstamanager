<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzSemaphoresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_semaphores', function (Blueprint $table) {
            $table->foreign('id_utente', 'zz_semaphores_ibfk_1')->references('id')->on('zz_users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_semaphores', function (Blueprint $table) {
            $table->dropForeign('zz_semaphores_ibfk_1');
        });
    }
}
