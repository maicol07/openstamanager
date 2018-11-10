<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInTariffeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_tariffe', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idtecnico');
            $table->string('idtipointervento', 25);
            $table->decimal('costo_ore', 12, 4);
            $table->decimal('costo_km', 12, 4);
            $table->decimal('costo_dirittochiamata', 12, 4);
            $table->decimal('costo_ore_tecnico', 12, 4);
            $table->decimal('costo_km_tecnico', 12, 4);
            $table->decimal('costo_dirittochiamata_tecnico', 12, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_tariffe');
    }
}
