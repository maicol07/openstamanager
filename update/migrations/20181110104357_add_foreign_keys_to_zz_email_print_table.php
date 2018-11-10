<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZzEmailPrintTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('zz_email_print', function (Blueprint $table) {
            $table->foreign('id_email', 'zz_email_print_ibfk_1')->references('id')->on('zz_emails')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_print', 'zz_email_print_ibfk_2')->references('id')->on('zz_prints')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('zz_email_print', function (Blueprint $table) {
            $table->dropForeign('zz_email_print_ibfk_1');
            $table->dropForeign('zz_email_print_ibfk_2');
        });
    }
}
