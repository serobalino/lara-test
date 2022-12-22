<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
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
            $table->string("telefono_em");
            $table->string("lat_em");
            $table->string("lng_em");
            $table->string("dominio_em");
            $table->timestamp('created_at')->nullable(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('empresas')->insert([
            [
                //'id_em'         =>  1,
                'nombre_em'     =>  'Inpsercom',
                'nombrel_em'    =>  'INTERNATIONAL PROFESSIONAL SERVICES S.A.',
                'color_em'      =>  '#9a0000',
                'logo_em'       =>  'https://raw.githubusercontent.com/Inpsercom-IT/ebiss/firma/logo.jpg?token=ADL5BL56KVHXQKCSW3JNURK5PJN56',
                'direccion_em'  =>  'Av. 10 de Agosto N° 311-62, Mariana de Jesús. Edificio MetroCar 4to Piso',
                'telefono_em'   =>  '022525175',
                'lat_em'        =>  '-0.189549',
                'lng_em'        =>  '-78.492309',
                'dominio_em'    =>  'inpsercom.com',
            ]
        ]);


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
}
