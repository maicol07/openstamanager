<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_logs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_utente')->nullable()->index('id_utente');
            $table->string('username', 50);
            $table->string('stato', 50);
            $table->string('ip', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_logs');
    }
}
