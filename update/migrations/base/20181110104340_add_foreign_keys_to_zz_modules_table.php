<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzModulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_modules', function (Blueprint $table) {
            $table->foreign('parent', 'zz_modules_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_modules', function (Blueprint $table) {
            $table->dropForeign('zz_modules_ibfk_1');
        });
    }
}
