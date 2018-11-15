<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzTokensTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_tokens', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_utente')->index('id_utente');
            $table->string('token');
            $table->string('descrizione')->nullable();
            $table->boolean('enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_tokens');
    }
}
