<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzOperationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_operations', function (Blueprint $table) {
            $table->integer('id_module')->nullable()->index('id_module');
            $table->integer('id_plugin')->nullable()->index('id_plugin');
            $table->integer('id_email')->nullable()->index('id_email');
            $table->integer('id_record')->nullable();
            $table->integer('id_utente')->index('id_utente');
            $table->string('op');
            $table->text('options', 65535)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_operations');
    }
}
