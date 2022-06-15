<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100)->nullable();
            $table->string('prenom', 100)->nullable();
            $table->date('date_naiss', 100)->nullable();
            $table->string('lieu_naiss', 100)->nullable();
            $table->string('adresse', 100)->nullable();
            $table->string('telephone', 30)->nullable();
            $table->bigInteger('diplome_id')->default(0);
            $table->string('image', 100)->nullable();
            $table->string('token', 100)->nullable();
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
        Schema::dropIfExists('profs');
    }
}
