<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoStaticontrattiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_staticontratti', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('descrizione', 100)->nullable();
            $table->string('icona');
            $table->boolean('pianificabile');
            $table->boolean('fatturabile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_staticontratti');
    }
}
