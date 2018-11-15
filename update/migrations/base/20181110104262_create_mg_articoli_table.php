<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgArticoliTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_articoli', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codice');
            $table->string('descrizione');
            $table->string('um', 20);
            $table->boolean('abilita_serial')->default(0);
            $table->string('immagine')->nullable();
            $table->string('note', 1000);
            $table->decimal('qta', 12, 4);
            $table->decimal('threshold_qta', 12, 4);
            $table->decimal('prezzo_acquisto', 12, 4);
            $table->decimal('prezzo_vendita', 12, 4);
            $table->integer('idiva_vendita');
            $table->integer('gg_garanzia');
            $table->decimal('peso_lordo', 12, 4);
            $table->decimal('volume', 12, 4);
            $table->string('componente_filename');
            $table->text('contenuto', 65535);
            $table->boolean('attivo');
            $table->timestamps();
            $table->integer('id_categoria');
            $table->integer('id_sottocategoria')->nullable();
            $table->boolean('servizio');
            $table->integer('idconto_vendita')->nullable();
            $table->integer('idconto_acquisto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_articoli');
    }
}
