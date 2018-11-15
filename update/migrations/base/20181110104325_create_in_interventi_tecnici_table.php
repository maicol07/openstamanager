<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInInterventiTecniciTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_interventi_tecnici', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idintervento')->nullable()->index('in_interventi_tecnici_ibfk_1');
            $table->string('idtipointervento', 25);
            $table->integer('idtecnico')->index('in_interventi_tecnici_ibfk_2');
            $table->dateTime('orario_inizio');
            $table->dateTime('orario_fine');
            $table->decimal('ore', 12, 4);
            $table->decimal('km', 12, 4);
            $table->decimal('prezzo_ore_unitario', 12, 4);
            $table->decimal('prezzo_km_unitario', 12, 4);
            $table->decimal('prezzo_ore_consuntivo', 12, 4);
            $table->decimal('prezzo_km_consuntivo', 12, 4);
            $table->decimal('prezzo_dirittochiamata', 12, 4);
            $table->decimal('prezzo_ore_unitario_tecnico', 12, 4);
            $table->decimal('prezzo_km_unitario_tecnico', 12, 4);
            $table->decimal('prezzo_ore_consuntivo_tecnico', 12, 4);
            $table->decimal('prezzo_km_consuntivo_tecnico', 12, 4);
            $table->decimal('prezzo_dirittochiamata_tecnico', 12, 4);
            $table->integer('uid')->nullable();
            $table->string('summary')->nullable();
            $table->timestamps();
            $table->decimal('sconto', 12, 4);
            $table->decimal('sconto_unitario', 12, 4);
            $table->enum('tipo_sconto', ['UNT', 'PRC'])->default('UNT');
            $table->decimal('scontokm', 12, 4);
            $table->decimal('scontokm_unitario', 12, 4);
            $table->enum('tipo_scontokm', ['UNT', 'PRC'])->default('UNT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_interventi_tecnici');
    }
}
