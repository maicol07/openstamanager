<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInStatiinterventoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('in_statiintervento', function (Blueprint $table) {
            $table->string('idstatointervento', 10)->primary();
            $table->string('descrizione');
            $table->string('colore', 7)->default('#FFFFFF');
            $table->boolean('can_delete')->default(1);
            $table->boolean('completato');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('notifica')->default(0);
            $table->integer('id_email')->nullable()->index('id_email');
            $table->string('destinatari')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('in_statiintervento');
    }
}
