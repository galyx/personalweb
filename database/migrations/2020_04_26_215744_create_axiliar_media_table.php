<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxiliarMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('axiliar_media', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('af_n');
            $table->string('axiliarmedia_r1')->nullable();
            $table->string('axiliarmedia_r2')->nullable();
            $table->string('media_amr')->nullable();
            $table->string('axiliarmedia_ls')->nullable();
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
        Schema::dropIfExists('axiliar_media');
    }
}
