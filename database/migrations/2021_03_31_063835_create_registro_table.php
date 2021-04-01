<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) 
        {
            $table->increments("id")->unsigned(); 
            $table->string('typedoc',50);
            $table->string('numdoc',15);
            $table->string('nombresperson',250);
            $table->string('edad',3);
            $table->string('namedepartment',240);
			$table->string('department_id',11); 
            $table->string('nameprovince',240);
			$table->string('province_id',11); 
            $table->string('namedistrict',240);  
            $table->string('district_id',11); 
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
        Schema::dropIfExists('registro');
    }
}
