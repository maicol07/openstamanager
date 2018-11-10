<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzFieldRecordTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_field_record', function (Blueprint $table) {
            $table->foreign('id_field', 'zz_field_record_ibfk_1')->references('id')->on('zz_fields')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_field_record', function (Blueprint $table) {
            $table->dropForeign('zz_field_record_ibfk_1');
        });
    }
}
