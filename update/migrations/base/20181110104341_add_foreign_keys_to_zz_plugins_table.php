<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzPluginsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_plugins', function (Blueprint $table) {
            $table->foreign('idmodule_from', 'zz_plugins_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idmodule_to', 'zz_plugins_ibfk_2')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_plugins', function (Blueprint $table) {
            $table->dropForeign('zz_plugins_ibfk_1');
            $table->dropForeign('zz_plugins_ibfk_2');
        });
    }
}
