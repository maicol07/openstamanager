<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgArticoliAutomezziTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_articoli_automezzi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idarticolo');
            $table->integer('idautomezzo');
            $table->decimal('qta', 12, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_articoli_automezzi');
    }
}
