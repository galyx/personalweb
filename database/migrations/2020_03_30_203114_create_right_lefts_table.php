<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightLeftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('right_lefts', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('af_n');
            $table->string('arm_cd');
            $table->string('arm_ce');
            $table->string('arm_rd');
            $table->string('arm_re');
            $table->string('forearm_d');
            $table->string('forearm_e');
            $table->string('thigh_d');
            $table->string('thigh_e');
            $table->string('thigh_md');
            $table->string('thigh_me');
            $table->string('calf_d');
            $table->string('calf_e');
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
        Schema::dropIfExists('right_lefts');
    }
}
