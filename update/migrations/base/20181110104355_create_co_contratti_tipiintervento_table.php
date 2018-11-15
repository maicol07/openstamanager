<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoContrattiTipiinterventoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_contratti_tipiintervento', function (Blueprint $table) {
            $table->integer('idcontratto');
            $table->string('idtipointervento', 25);
            $table->decimal('costo_ore', 12, 4);
            $table->decimal('costo_km', 12, 4);
            $table->decimal('costo_dirittochiamata', 12, 4);
            $table->decimal('costo_ore_tecnico', 12, 4);
            $table->decimal('costo_km_tecnico', 12, 4);
            $table->decimal('costo_dirittochiamata_tecnico', 12, 4);
            $table->timestamps();
            $table->primary(['idcontratto', 'idtipointervento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_contratti_tipiintervento');
    }
}
