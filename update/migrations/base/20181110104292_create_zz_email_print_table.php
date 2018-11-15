<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzEmailPrintTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_email_print', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_email')->index('id_email');
            $table->integer('id_print')->index('id_print');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_email_print');
    }
}
