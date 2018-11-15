<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzFieldsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_fields', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_module')->nullable()->index('id_module');
            $table->integer('id_plugin')->nullable()->index('id_plugin');
            $table->string('name');
            $table->string('html_name');
            $table->text('content', 65535);
            $table->text('options', 65535)->nullable();
            $table->integer('order');
            $table->boolean('on_add');
            $table->boolean('top');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_fields');
    }
}
