<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgMovimentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_movimenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idarticolo');
            $table->decimal('qta', 12, 4);
            $table->string('movimento');
            $table->date('data');
            $table->boolean('manuale');
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->integer('idddt');
            $table->integer('iddocumento');
            $table->integer('idautomezzo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_movimenti');
    }
}
