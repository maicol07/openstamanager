<?php

use Util\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzSegmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_segments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_module');
            $table->string('name');
            $table->text('clause', 65535);
            $table->enum('position', ['WHR', 'HVN'])->default('WHR');
            $table->string('pattern');
            $table->text('note', 65535);
            $table->boolean('predefined')->default(0);
            $table->boolean('predefined_accredito');
            $table->boolean('predefined_addebito');
            $table->timestamps();
            $table->boolean('is_fiscale')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_segments');
    }
}
