<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtCausaletTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_causalet', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione');
            $table->timestamps();
            $table->boolean('predefined')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_causalet');
    }
}
