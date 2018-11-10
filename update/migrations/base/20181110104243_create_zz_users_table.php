<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username');
            $table->string('password');
            $table->string('email', 50);
            $table->integer('idanagrafica');
            $table->integer('idgruppo')->index('idgruppo');
            $table->boolean('enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_users');
    }
}
