<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_widgets', function (Blueprint $table) {
            $table->foreign('id_module', 'zz_widgets_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_widgets', function (Blueprint $table) {
            $table->dropForeign('zz_widgets_ibfk_1');
        });
    }
}
