<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMgProdottiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('mg_prodotti', function (Blueprint $table) {
            $table->foreign('id_riga_documento', 'mg_prodotti_ibfk_1')->references('id')->on('co_righe_documenti')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_riga_ordine', 'mg_prodotti_ibfk_2')->references('id')->on('or_righe_ordini')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_riga_ddt', 'mg_prodotti_ibfk_3')->references('id')->on('dt_righe_ddt')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_riga_intervento', 'mg_prodotti_ibfk_4')->references('id')->on('mg_articoli_interventi')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_articolo', 'mg_prodotti_ibfk_5')->references('id')->on('mg_articoli')->onUpdate('RESTRICT')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('mg_prodotti', function (Blueprint $table) {
            $table->dropForeign('mg_prodotti_ibfk_1');
            $table->dropForeign('mg_prodotti_ibfk_2');
            $table->dropForeign('mg_prodotti_ibfk_3');
            $table->dropForeign('mg_prodotti_ibfk_4');
            $table->dropForeign('mg_prodotti_ibfk_5');
        });
    }
}
