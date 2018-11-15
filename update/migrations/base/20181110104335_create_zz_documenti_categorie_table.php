<?php

use Update\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzDocumentiCategorieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('zz_documenti_categorie', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descrizione');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('zz_documenti_categorie');
    }
}
