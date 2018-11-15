<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoDocumentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_documenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero', 100);
            $table->string('numero_esterno', 100);
            $table->date('data')->nullable();
            $table->integer('idanagrafica');
            $table->integer('idagente');
            $table->integer('ref_documento')->nullable()->index('ref_documento');
            $table->integer('idcausalet');
            $table->integer('idspedizione');
            $table->integer('idporto');
            $table->integer('idaspettobeni');
            $table->integer('idvettore');
            $table->integer('n_colli');
            $table->integer('idsede');
            $table->boolean('idtipodocumento');
            $table->boolean('idstatodocumento');
            $table->integer('idpagamento');
            $table->integer('idbanca');
            $table->integer('idconto');
            $table->integer('idrivalsainps');
            $table->integer('idritenutaacconto');
            $table->decimal('rivalsainps', 12, 4);
            $table->decimal('iva_rivalsainps', 12, 4);
            $table->decimal('ritenutaacconto', 12, 4);
            $table->decimal('bollo', 12, 4);
            $table->text('note', 65535);
            $table->text('note_aggiuntive', 65535);
            $table->string('buono_ordine', 50);
            $table->timestamps();
            $table->decimal('sconto_globale', 12, 4);
            $table->enum('tipo_sconto_globale', ['UNT', 'PRC'])->default('UNT');
            $table->integer('id_segment');
            $table->string('codice_xml')->nullable();
            $table->dateTime('xml_generated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_documenti');
    }
}
