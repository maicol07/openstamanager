<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzOperationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_operations', function (Blueprint $table) {
            $table->foreign('id_module', 'zz_operations_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_plugin', 'zz_operations_ibfk_2')->references('id')->on('zz_plugins')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_email', 'zz_operations_ibfk_3')->references('id')->on('zz_emails')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_utente', 'zz_operations_ibfk_4')->references('id')->on('zz_users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_operations', function (Blueprint $table) {
            $table->dropForeign('zz_operations_ibfk_1');
            $table->dropForeign('zz_operations_ibfk_2');
            $table->dropForeign('zz_operations_ibfk_3');
            $table->dropForeign('zz_operations_ibfk_4');
        });
    }
}
