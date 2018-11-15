<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoTipidocumentoTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_tipidocumento', function (Blueprint $table) {
            $table->foreign('codice_tipo_documento_fe', 'co_tipidocumento_ibfk_1')->references('codice')->on('fe_tipi_documento')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_tipidocumento', function (Blueprint $table) {
            $table->dropForeign('co_tipidocumento_ibfk_1');
        });
    }
}
