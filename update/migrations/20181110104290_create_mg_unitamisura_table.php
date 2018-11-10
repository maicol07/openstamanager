<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgUnitamisuraTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_unitamisura', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('valore', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_unitamisura');
    }
}
