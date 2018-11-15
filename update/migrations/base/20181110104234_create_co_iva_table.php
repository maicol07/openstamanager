<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoIvaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_iva', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione', 100);
            $table->decimal('percentuale', 5);
            $table->decimal('indetraibile', 5);
            $table->boolean('esente');
            $table->timestamps();
            $table->string('dicitura')->nullable();
            $table->string('codice_natura_fe', 4)->nullable()->index('codice_natura_fe');
            $table->softDeletes();
            $table->integer('codice')->nullable();
            $table->enum('esigibilita', ['I', 'D', 'S'])->default('I');
            $table->boolean('default')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_iva');
    }
}
