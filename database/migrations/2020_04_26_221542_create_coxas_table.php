<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoxasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coxas', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('af_n');
            $table->string('coxa_r1')->nullable();
            $table->string('coxa_r2')->nullable();
            $table->string('media_cr')->nullable();
            $table->string('coxa_ls')->nullable();
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
        Schema::dropIfExists('coxas');
    }
}
