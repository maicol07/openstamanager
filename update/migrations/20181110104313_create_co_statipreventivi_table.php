<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoStatipreventiviTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_statipreventivi', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100);
            $table->string('icona');
            $table->boolean('completato')->default(0);
            $table->boolean('annullato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_statipreventivi');
    }
}
