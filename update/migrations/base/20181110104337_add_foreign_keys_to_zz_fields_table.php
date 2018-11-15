<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzFieldsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_fields', function (Blueprint $table) {
            $table->foreign('id_module', 'zz_fields_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_plugin', 'zz_fields_ibfk_2')->references('id')->on('zz_plugins')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_fields', function (Blueprint $table) {
            $table->dropForeign('zz_fields_ibfk_1');
            $table->dropForeign('zz_fields_ibfk_2');
        });
    }
}
