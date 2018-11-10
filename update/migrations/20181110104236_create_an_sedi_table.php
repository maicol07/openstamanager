<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnSediTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('an_sedi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nomesede')->comment('Nome sede');
            $table->string('piva', 15)->comment('P.Iva');
            $table->string('codice_fiscale', 16)->comment('Codice Fiscale');
            $table->string('indirizzo')->comment('Indirizzo');
            $table->string('indirizzo2')->comment('Indirizzo2');
            $table->string('citta')->comment('Citt&agrave;');
            $table->string('cap', 10)->comment('C.A.P.');
            $table->string('provincia', 2)->comment('Provincia');
            $table->decimal('km', 10);
            $table->integer('id_nazione')->nullable()->index('id_nazione')->comment('Nazione');
            $table->string('telefono', 20)->comment('Telefono');
            $table->string('fax', 20)->comment('Fax');
            $table->string('cellulare', 20)->comment('Cellulare');
            $table->string('email')->comment('Email');
            $table->integer('idanagrafica');
            $table->integer('idzona');
            $table->timestamps();
            $table->string('gaddress')->nullable();
            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('an_sedi');
    }
}
