<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicipitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicipitals', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('af_n');
            $table->string('bicipital_r1')->nullable();
            $table->string('bicipital_r2')->nullable();
            $table->string('media_br')->nullable();
            $table->string('bicipital_ls')->nullable();
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
        Schema::dropIfExists('bicipitals');
    }
}
