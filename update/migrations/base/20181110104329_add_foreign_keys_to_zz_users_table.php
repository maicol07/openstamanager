<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_users', function (Blueprint $table) {
            $table->foreign('idgruppo', 'zz_users_ibfk_1')->references('id')->on('zz_groups')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_users', function (Blueprint $table) {
            $table->dropForeign('zz_users_ibfk_1');
        });
    }
}
