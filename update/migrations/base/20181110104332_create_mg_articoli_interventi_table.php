<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgArticoliInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('mg_articoli_interventi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idarticolo');
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->string('descrizione');
            $table->decimal('prezzo_acquisto', 12, 4);
            $table->decimal('prezzo_vendita', 12, 4);
            $table->decimal('sconto', 12, 4);
            $table->decimal('sconto_unitario', 12, 4);
            $table->enum('tipo_sconto', ['UNT', 'PRC'])->default('UNT');
            $table->integer('idiva');
            $table->string('desc_iva');
            $table->decimal('iva', 12, 4);
            $table->integer('idautomezzo');
            $table->decimal('qta', 10);
            $table->string('um', 20);
            $table->boolean('abilita_serial')->default(0);
            $table->timestamps();
            $table->integer('idimpianto')->nullable()->index('idimpianto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('mg_articoli_interventi');
    }
}
