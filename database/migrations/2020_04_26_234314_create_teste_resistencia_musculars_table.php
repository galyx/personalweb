<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesteResistenciaMuscularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teste_resistencia_musculars', function (Blueprint $table) {
            $table->id();
            $table->string('access_code')->nullable();
            $table->string('af_n')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('abdomencheck')->nullable();
            $table->string('flexao')->nullable();
            $table->string('flexaocheck')->nullable();
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
        Schema::dropIfExists('teste_resistencia_musculars');
    }
}
