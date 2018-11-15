<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzGroupViewTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_group_view', function (Blueprint $table) {
            $table->foreign('id_gruppo', 'zz_group_view_ibfk_1')->references('id')->on('zz_groups')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_vista', 'zz_group_view_ibfk_2')->references('id')->on('zz_views')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_group_view', function (Blueprint $table) {
            $table->dropForeign('zz_group_view_ibfk_1');
            $table->dropForeign('zz_group_view_ibfk_2');
        });
    }
}
