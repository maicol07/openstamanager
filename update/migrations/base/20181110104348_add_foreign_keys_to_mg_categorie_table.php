<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMgCategorieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('mg_categorie', function (Blueprint $table) {
            $table->foreign('parent', 'mg_categorie_ibfk_1')->references('id')->on('mg_categorie')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('mg_categorie', function (Blueprint $table) {
            $table->dropForeign('mg_categorie_ibfk_1');
        });
    }
}
