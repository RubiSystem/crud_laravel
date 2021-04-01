<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->increments("id")->unsigned();  
            $table->text('name_tbl',240); 
            $table->integer("department_id")->unsigned();          
            $table->foreign("department_id")->references("id")->on("department")
            ->onDelete("cascade")
            ->onUpdate("cascade");            
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
        Schema::dropIfExists('province');
    }
}
