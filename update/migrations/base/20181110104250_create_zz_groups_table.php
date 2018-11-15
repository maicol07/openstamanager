<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzGroupsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_groups', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome', 50);
            $table->boolean('editable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_groups');
    }
}
