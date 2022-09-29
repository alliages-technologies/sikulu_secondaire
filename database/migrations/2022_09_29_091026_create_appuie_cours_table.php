<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppuieCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appuie_cours', function (Blueprint $table) {
            $table->id();
            $table->string('objet',200)->nullable();
            $table->string('cours',200)->nullable();
            $table->integer('user_id')->default(0);
            $table->integer('ecole_id')->default(0);
            $table->integer('programme_ecole_ligne_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appuie_cours');
    }
}
