<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrRigheOrdiniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('or_righe_ordini', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('data_evasione')->nullable();
            $table->integer('idordine');
            $table->integer('idarticolo');
            $table->integer('idpreventivo');
            $table->boolean('is_descrizione');
            $table->integer('idiva');
            $table->string('desc_iva');
            $table->integer('idagente');
            $table->decimal('iva', 12, 4);
            $table->decimal('iva_indetraibile', 12, 4);
            $table->text('descrizione', 65535);
            $table->decimal('subtotale', 12, 4);
            $table->decimal('sconto', 12, 4);
            $table->decimal('sconto_unitario', 12, 4);
            $table->enum('tipo_sconto', ['UNT', 'PRC'])->default('UNT');
            $table->boolean('sconto_globale')->default(0);
            $table->string('um', 20);
            $table->boolean('abilita_serial')->default(0);
            $table->decimal('qta', 12, 4);
            $table->decimal('qta_evasa', 12, 4);
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('or_righe_ordini');
    }
}
