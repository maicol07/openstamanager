<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzGroupModuleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_group_module', function (Blueprint $table) {
            $table->foreign('idmodule', 'zz_group_module_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('idgruppo', 'zz_group_module_ibfk_2')->references('id')->on('zz_groups')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_group_module', function (Blueprint $table) {
            $table->dropForeign('zz_group_module_ibfk_1');
            $table->dropForeign('zz_group_module_ibfk_2');
        });
    }
}
