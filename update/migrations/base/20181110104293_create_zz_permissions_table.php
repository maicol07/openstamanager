<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_permissions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idgruppo')->index('idgruppo');
            $table->integer('idmodule')->index('idmodule');
            $table->enum('permessi', ['-', 'r', 'rw']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_permissions');
    }
}
