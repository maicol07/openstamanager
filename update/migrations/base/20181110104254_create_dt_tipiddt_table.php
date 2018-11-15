<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtTipiddtTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_tipiddt', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100)->nullable();
            $table->enum('dir', ['entrata', 'uscita'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_tipiddt');
    }
}
