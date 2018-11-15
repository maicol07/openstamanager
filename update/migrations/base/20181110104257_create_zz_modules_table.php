<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzModulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_modules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('title');
            $table->string('directory', 50);
            $table->text('options', 65535);
            $table->text('options2', 65535);
            $table->string('icon');
            $table->string('version', 15);
            $table->string('compatibility', 1000);
            $table->integer('order');
            $table->integer('parent')->nullable()->index('parent');
            $table->boolean('default')->default(0);
            $table->boolean('enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_modules');
    }
}
