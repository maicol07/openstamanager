<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoOrdiniservizioPianificazionefattureTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_ordiniservizio_pianificazionefatture', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idcontratto');
            $table->date('data_scadenza')->nullable();
            $table->integer('idzona');
            $table->integer('iddocumento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_ordiniservizio_pianificazionefatture');
    }
}
