<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzPrintsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_prints', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_module')->index('id_module');
            $table->boolean('is_record')->default(1);
            $table->string('name');
            $table->string('title');
            $table->string('directory', 50);
            $table->string('previous', 50);
            $table->text('options', 65535);
            $table->string('icon', 50);
            $table->string('version', 15);
            $table->string('compatibility', 1000);
            $table->integer('order');
            $table->boolean('predefined')->default(0);
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
        $this->schema->drop('zz_prints');
    }
}
