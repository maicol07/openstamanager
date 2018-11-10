<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInTipiinterventoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_tipiintervento', function (Blueprint $table) {
            $table->string('idtipointervento', 25)->primary();
            $table->string('descrizione');
            $table->decimal('costo_orario', 12, 4);
            $table->decimal('costo_km', 12, 4);
            $table->decimal('costo_diritto_chiamata', 12, 4);
            $table->decimal('costo_orario_tecnico', 12, 4);
            $table->decimal('costo_km_tecnico', 12, 4);
            $table->decimal('costo_diritto_chiamata_tecnico', 12, 4);
            $table->decimal('tempo_standard', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_tipiintervento');
    }
}
