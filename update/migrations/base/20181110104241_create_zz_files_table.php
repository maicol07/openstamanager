<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzFilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_files', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('filename');
            $table->string('original');
            $table->string('category', 100)->nullable();
            $table->integer('id_module')->nullable();
            $table->integer('id_plugin')->nullable();
            $table->integer('id_record');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_files');
    }
}
