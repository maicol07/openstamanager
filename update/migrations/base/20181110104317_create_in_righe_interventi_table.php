<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInRigheInterventiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_righe_interventi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione');
            $table->float('qta', 12, 4);
            $table->string('um', 25);
            $table->decimal('prezzo_vendita', 12, 4);
            $table->decimal('prezzo_acquisto', 12, 4);
            $table->integer('idiva');
            $table->string('desc_iva');
            $table->decimal('iva', 12, 4);
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->timestamps();
            $table->decimal('sconto', 12, 4);
            $table->decimal('sconto_unitario', 12, 4);
            $table->enum('tipo_sconto', ['UNT', 'PRC'])->default('UNT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_righe_interventi');
    }
}
