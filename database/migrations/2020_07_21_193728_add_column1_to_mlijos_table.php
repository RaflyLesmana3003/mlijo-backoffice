<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumn1ToMlijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mlijos', function (Blueprint $table) {
            $table->string('atasnama')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('no_rekening')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mlijos', function (Blueprint $table) {
            //
        });
    }
}
