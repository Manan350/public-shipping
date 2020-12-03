<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Requests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_masterTable', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->Integer('journey_id');
            $table->bigInteger('traveller_id')->references('user_id')->on('traveller_masterTable');
            $table->BigInteger('r_id')->references('id')->on('registrations_masterTable');
            $table->String('category');
            $table->String('item_name');
            $table->String('discription');
            $table->tinyInteger('status');
            $table->Integer('price');
            $table->date('arrival');
            $table->String('from');
            $table->String('to');
          
            
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
        Schema::dropIfExists('request_masterTable');
    }
}
