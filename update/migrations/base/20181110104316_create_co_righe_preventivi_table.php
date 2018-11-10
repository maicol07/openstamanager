<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoRighePreventiviTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_righe_preventivi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('data_evasione')->nullable();
            $table->integer('idpreventivo')->index('idpreventivo');
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
            $table->decimal('qta', 12, 4);
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_righe_preventivi');
    }
}
