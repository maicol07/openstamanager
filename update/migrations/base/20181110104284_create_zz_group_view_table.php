<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzGroupViewTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_group_view', function (Blueprint $table) {
            $table->integer('id_gruppo');
            $table->integer('id_vista')->index('id_vista');
            $table->timestamps();
            $table->primary(['id_gruppo', 'id_vista']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_group_view');
    }
}
