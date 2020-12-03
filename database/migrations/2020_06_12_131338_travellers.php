<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Travellers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traveller_masterTable', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->referneces('id')->on('registrations_masterTable');
            $table->String('From');
            $table->String('To');
            $table->date('arrival');
            $table->date('departure');
            
            $table->timestamps();
        });
        DB::statement("ALTER TABLE traveller_masterTable ADD ticket LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traveller_masterTable');
    }
}
