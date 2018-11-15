<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrOrdiniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('or_ordini', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 100);
            $table->string('numero_esterno', 100);
            $table->date('data')->nullable();
            $table->integer('idagente');
            $table->integer('idanagrafica');
            $table->integer('idsede');
            $table->boolean('idtipoordine');
            $table->boolean('idstatoordine');
            $table->integer('idpagamento');
            $table->integer('idconto');
            $table->integer('idrivalsainps');
            $table->integer('idritenutaacconto');
            $table->decimal('rivalsainps', 12, 4);
            $table->decimal('iva_rivalsainps', 12, 4);
            $table->decimal('ritenutaacconto', 12, 4);
            $table->decimal('bollo', 10);
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
        $this->schema->drop('or_ordini');
    }
}
