<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMyImpiantiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('my_impianti', function (Blueprint $table) {
            $table->foreign('id_categoria', 'my_impianti_ibfk_1')->references('id')->on('my_impianti_categorie')->onUpdate('RESTRICT')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('my_impianti', function (Blueprint $table) {
            $table->dropForeign('my_impianti_ibfk_1');
        });
    }
}
