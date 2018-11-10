<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoRitenutaaccontoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_ritenutaacconto', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione', 100);
            $table->decimal('percentuale', 5);
            $table->decimal('indetraibile', 5);
            $table->boolean('esente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_ritenutaacconto');
    }
}
