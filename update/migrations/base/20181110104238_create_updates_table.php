<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('updates', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('directory')->nullable();
            $table->string('version');
            $table->boolean('sql');
            $table->boolean('script');
            $table->integer('done')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('updates');
    }
}
