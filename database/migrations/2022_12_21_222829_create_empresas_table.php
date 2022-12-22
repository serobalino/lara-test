<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id_em');
            $table->string("nombre_em");
            $table->string("nombrel_em");
            $table->string("color_em");
            $table->string("logo_em");
            $table->string("direccion_em");
            $table->string("telefono_em")->nullable();
            $table->string("lat_em");
            $table->string("lng_em");
            $table->string("dominio_em");
            $table->timestamp('created_at')->nullable(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
