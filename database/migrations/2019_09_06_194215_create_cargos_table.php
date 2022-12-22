<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->bigIncrements('id_ca');
            $table->unsignedBigInteger('id_de');
            $table->string("nombre_ca");
            $table->timestamp('created_at')->nullable(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('id_de')->references('id_de')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos', function (Blueprint $table) {
            $table->dropForeign(['id_de']);
        });
    }
}
