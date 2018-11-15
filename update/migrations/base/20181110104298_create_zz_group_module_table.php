<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzGroupModuleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_group_module', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idgruppo')->index('idgruppo');
            $table->integer('idmodule')->index('idmodule');
            $table->string('name');
            $table->string('clause', 5000);
            $table->enum('position', ['WHR', 'HVN'])->default('WHR');
            $table->boolean('enabled')->default(1);
            $table->boolean('default')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_group_module');
    }
}
