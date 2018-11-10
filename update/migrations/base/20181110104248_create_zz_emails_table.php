<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzEmailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_emails', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_module')->index('id_module');
            $table->integer('id_smtp')->index('id_smtp');
            $table->string('name');
            $table->string('icon', 50);
            $table->string('subject');
            $table->string('reply_to');
            $table->string('cc');
            $table->string('bcc');
            $table->text('body', 65535);
            $table->boolean('read_notify');
            $table->boolean('predefined')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_emails');
    }
}
