<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoOrdiniservizioTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_ordiniservizio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idcontratto');
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->date('data_scadenza')->nullable();
            $table->boolean('copia_centrale');
            $table->boolean('copia_cliente');
            $table->boolean('copia_amministratore');
            $table->boolean('funzionamento_in_sicurezza');
            $table->enum('stato', ['aperto', 'chiuso']);
            $table->timestamps();
            $table->integer('idimpianto')->nullable()->index('idimpianto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_ordiniservizio');
    }
}
