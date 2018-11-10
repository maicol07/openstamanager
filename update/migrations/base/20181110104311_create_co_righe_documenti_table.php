<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoRigheDocumentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_righe_documenti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('iddocumento');
            $table->integer('idordine');
            $table->integer('idddt');
            $table->integer('idintervento')->nullable();
            $table->integer('idarticolo');
            $table->integer('idpreventivo');
            $table->integer('idcontratto');
            $table->integer('ref_riga_documento')->nullable()->index('ref_riga_documento');
            $table->boolean('is_descrizione');
            $table->boolean('is_preventivo');
            $table->boolean('is_contratto');
            $table->integer('idtecnico');
            $table->integer('idagente');
            $table->integer('idautomezzo');
            $table->integer('idconto');
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
            $table->integer('idritenutaacconto');
            $table->decimal('ritenutaacconto', 12, 4);
            $table->integer('idrivalsainps');
            $table->decimal('rivalsainps', 12, 4);
            $table->string('calcolo_ritenutaacconto');
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
        $this->schema->drop('co_righe_documenti');
    }
}
