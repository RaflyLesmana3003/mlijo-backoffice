<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMlijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mlijos', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('nama');
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('parent')->nullable();
            $table->string('child')->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto_ktp')->nullable();
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
        Schema::dropIfExists('mlijos');
    }
}
