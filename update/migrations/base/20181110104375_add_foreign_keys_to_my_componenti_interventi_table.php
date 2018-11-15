<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMyComponentiInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('my_componenti_interventi', function (Blueprint $table) {
            $table->foreign('id_intervento', 'my_componenti_interventi_ibfk_1')->references('id')->on('in_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_componente', 'my_componenti_interventi_ibfk_2')->references('id')->on('my_impianto_componenti')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('my_componenti_interventi', function (Blueprint $table) {
            $table->dropForeign('my_componenti_interventi_ibfk_1');
            $table->dropForeign('my_componenti_interventi_ibfk_2');
        });
    }
}
