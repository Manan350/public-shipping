<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Delieries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverie_masterTable', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('req_id')->references('id')->on('request_masterTable');
            $table->tinyInteger('delivery_status');
            $table->date('traveller_arrival_date');
            $table->tinyInteger('panelty');
            $table->String('order_Id')->unique();
            $table->Integer('margin_price');
            $table->tinyInteger('changable');
            $table->tinyInteger('download');
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
        //
    }
}
