<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzFieldRecordTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_field_record', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_field')->index('id_field');
            $table->integer('id_record');
            $table->text('value', 65535);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_field_record');
    }
}
