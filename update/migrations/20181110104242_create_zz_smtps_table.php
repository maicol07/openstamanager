<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_smtps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('note');
            $table->string('server');
            $table->string('port');
            $table->string('username');
            $table->string('password');
            $table->string('from_name');
            $table->string('from_address');
            $table->enum('encryption', ['', 'tls', 'ssl']);
            $table->boolean('pec');
            $table->boolean('predefined')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_smtps');
    }
}
