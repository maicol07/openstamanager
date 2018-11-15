<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzViewsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_views', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_module')->index('id_module');
            $table->string('name');
            $table->text('query', 65535)->nullable();
            $table->boolean('order');
            $table->boolean('search')->default(1);
            $table->boolean('slow')->default(0);
            $table->boolean('format')->default(0);
            $table->string('search_inside')->nullable();
            $table->string('order_by')->nullable();
            $table->boolean('visible')->default(1);
            $table->boolean('summable')->default(0);
            $table->boolean('default')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_views');
    }
}
