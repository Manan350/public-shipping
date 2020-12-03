<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Registration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations_masterTable', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            
            $table->String('fname');
            $table->String('lname');
            $table->String('email')->unique();
            $table->mediumText('password');
        
            $table->String('code');
            $table->date('dob');
            $table->String('mobile')->unique();
            $table->String('country');
            $table->String('state');
            $table->String('city');
            $table->String('zip');
            $table->mediumText('local_area');
            $table->Integer('status');
            
            $table->timestamps();
        });
        DB::statement("ALTER TABLE registrations_masterTable ADD avatar LONGBLOB");
        DB::statement("ALTER TABLE registrations_masterTable ADD GOV_id LONGBLOB");
        //DB::query('ALTER TABLE registrations_masterTable ADD avatar LONGBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations_masterTable');
    }
}
