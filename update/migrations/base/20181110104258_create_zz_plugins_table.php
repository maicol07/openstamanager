<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzPluginsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_plugins', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('title');
            $table->integer('idmodule_from')->index('idmodule_from');
            $table->integer('idmodule_to')->index('idmodule_to');
            $table->string('position', 50);
            $table->string('script');
            $table->boolean('enabled')->default(1);
            $table->boolean('default')->default(0);
            $table->integer('order');
            $table->string('compatibility', 1000);
            $table->string('version', 15);
            $table->text('options2', 65535)->nullable();
            $table->text('options', 65535)->nullable();
            $table->string('directory', 50);
            $table->string('help');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_plugins');
    }
}
