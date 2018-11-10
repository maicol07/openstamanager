<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzDocumentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_documenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idcategoria');
            $table->string('nome');
            $table->date('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_documenti');
    }
}
