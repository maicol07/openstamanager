<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_logs', function (Blueprint $table) {
            $table->foreign('id_utente', 'zz_logs_ibfk_1')->references('id')->on('zz_users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_logs', function (Blueprint $table) {
            $table->dropForeign('zz_logs_ibfk_1');
        });
    }
}
