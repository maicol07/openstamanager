<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoPagamentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->table('co_pagamenti', function (Blueprint $table) {
            $table->foreign('codice_modalita_pagamento_fe', 'co_pagamenti_ibfk_1')->references('codice')->on('fe_modalita_pagamento')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('co_pagamenti', function (Blueprint $table) {
            $table->dropForeign('co_pagamenti_ibfk_1');
        });
    }
}
