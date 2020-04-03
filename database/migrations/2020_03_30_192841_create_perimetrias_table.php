<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerimetriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perimetrias', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('af_n');
            $table->string('neck');
            $table->string('deltoids');
            $table->string('chest');
            $table->string('abdome_c');
            $table->string('abdome_m');
            $table->string('hip');
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
        Schema::dropIfExists('perimetrias');
    }
}
