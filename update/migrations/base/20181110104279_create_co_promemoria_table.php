<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoPromemoriaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('co_promemoria', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idcontratto');
            $table->integer('idintervento')->nullable()->index('idintervento');
            $table->string('idtipointervento', 25);
            $table->date('data_richiesta')->nullable();
            $table->string('richiesta', 8000);
            $table->integer('idsede');
            $table->string('idimpianti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('co_promemoria');
    }
}
