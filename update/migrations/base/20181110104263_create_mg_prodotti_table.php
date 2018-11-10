<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgProdottiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_prodotti', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('id_articolo')->nullable()->index('id_articolo');
            $table->string('lotto', 50)->nullable();
            $table->string('serial', 50)->nullable();
            $table->string('altro', 50)->nullable();
            $table->timestamps();
            $table->integer('id_riga_documento')->nullable()->index('id_riga_documento');
            $table->integer('id_riga_ordine')->nullable()->index('id_riga_ordine');
            $table->integer('id_riga_ddt')->nullable()->index('id_riga_ddt');
            $table->integer('id_riga_intervento')->nullable()->index('id_riga_intervento');
            $table->enum('dir', ['entrata', 'uscita'])->nullable()->default('uscita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_prodotti');
    }
}
