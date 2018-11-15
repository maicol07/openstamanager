<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoPromemoriaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_promemoria', function (Blueprint $table) {
            $table->foreign('idintervento', 'co_promemoria_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_promemoria', function (Blueprint $table) {
            $table->dropForeign('co_promemoria_ibfk_1');
        });
    }
}
