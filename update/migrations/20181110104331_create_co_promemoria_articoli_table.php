<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPromemoriaArticoliTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_promemoria_articoli', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idarticolo');
            $table->integer('id_promemoria')->index('id_riga_contratto');
            $table->string('descrizione');
            $table->decimal('prezzo_acquisto', 12, 4);
            $table->decimal('prezzo_vendita', 12, 4);
            $table->decimal('sconto', 12, 4);
            $table->decimal('sconto_unitario', 12, 4);
            $table->enum('tipo_sconto', ['UNT', 'PRC'])->default('UNT');
            $table->integer('idiva');
            $table->string('desc_iva');
            $table->decimal('iva', 12, 4);
            $table->integer('idautomezzo');
            $table->decimal('qta', 10);
            $table->string('um', 20);
            $table->boolean('abilita_serial')->default(0);
            $table->integer('idimpianto')->nullable()->index('idimpianto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_promemoria_articoli');
    }
}
