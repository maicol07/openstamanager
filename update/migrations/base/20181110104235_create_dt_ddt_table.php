<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtDdtTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_ddt', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('numero');
            $table->string('numero_esterno', 100);
            $table->date('data')->nullable();
            $table->integer('idagente');
            $table->integer('idiva');
            $table->integer('idanagrafica');
            $table->integer('idcausalet');
            $table->boolean('idspedizione');
            $table->boolean('idporto');
            $table->boolean('idaspettobeni');
            $table->integer('idvettore');
            $table->boolean('idtipoddt');
            $table->boolean('idstatoddt');
            $table->integer('idpagamento');
            $table->integer('idconto');
            $table->integer('idrivalsainps');
            $table->integer('idritenutaacconto');
            $table->integer('idsede');
            $table->decimal('rivalsainps', 12, 4);
            $table->decimal('iva_rivalsainps', 12, 4);
            $table->decimal('ritenutaacconto', 12, 4);
            $table->decimal('bollo', 12, 4);
            $table->integer('n_colli');
            $table->string('note');
            $table->text('note_aggiuntive', 65535);
            $table->timestamps();
            $table->decimal('sconto_globale', 12, 4);
            $table->enum('tipo_sconto_globale', ['UNT', 'PRC'])->default('UNT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('dt_ddt');
    }
}
