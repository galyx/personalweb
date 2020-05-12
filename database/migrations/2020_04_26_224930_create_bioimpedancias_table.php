<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioimpedanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bioimpedancias', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('af_n');
            $table->string('gorduracorporal')->nullable();
            $table->string('massamuscular')->nullable();
            $table->string('agua')->nullable();
            $table->string('proteina')->nullable();
            $table->string('gorduravisceral')->nullable();
            $table->string('massaossea_p')->nullable();
            $table->string('massaossea_kg')->nullable();
            $table->string('idadecorporal')->nullable();
            $table->string('taxametabolismo')->nullable();
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
        Schema::dropIfExists('bioimpedancias');
    }
}
