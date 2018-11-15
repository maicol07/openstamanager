<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzSettingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_settings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->text('valore', 65535);
            $table->string('tipo', 1000);
            $table->boolean('editable');
            $table->string('sezione', 100);
            $table->timestamps();
            $table->integer('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_settings');
    }
}
