<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDtRigheDdtTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('dt_righe_ddt', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idddt');
            $table->integer('idordine');
            $table->integer('idarticolo');
            $table->boolean('is_descrizione');
            $table->integer('idiva');
            $table->string('desc_iva');
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
        $this->schema->drop('dt_righe_ddt');
    }
}
