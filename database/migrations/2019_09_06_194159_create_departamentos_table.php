<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->bigIncrements('id_de');
            $table->unsignedBigInteger('id_em');
            $table->string("titulo_de");
            $table->timestamp('created_at')->nullable(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('id_em')->references('id_em')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos', function (Blueprint $table) {
            $table->dropForeign(['id_em']);
        });
    }
}
