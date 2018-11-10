<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzEmailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_emails', function (Blueprint $table) {
            $table->foreign('id_module', 'zz_emails_ibfk_1')->references('id')->on('zz_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_smtp', 'zz_emails_ibfk_2')->references('id')->on('zz_smtps')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_emails', function (Blueprint $table) {
            $table->dropForeign('zz_emails_ibfk_1');
            $table->dropForeign('zz_emails_ibfk_2');
        });
    }
}
