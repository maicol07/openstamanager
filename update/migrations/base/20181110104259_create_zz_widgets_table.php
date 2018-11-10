<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_widgets', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->enum('type', ['stats', 'chart', 'custom', 'print'])->nullable();
            $table->integer('id_module')->index('id_module');
            $table->enum('location', ['controller_top', 'controller_right', 'editor_top', 'editor_right'])->nullable();
            $table->string('class', 50)->nullable();
            $table->text('query', 65535)->nullable();
            $table->string('bgcolor', 7)->nullable();
            $table->string('icon')->nullable();
            $table->string('print_link')->nullable();
            $table->string('more_link', 5000)->nullable();
            $table->enum('more_link_type', ['link', 'popup', 'javascript'])->nullable();
            $table->string('php_include')->nullable();
            $table->text('text', 65535)->nullable();
            $table->boolean('enabled')->nullable();
            $table->integer('order')->nullable();
            $table->string('help')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_widgets');
    }
}
