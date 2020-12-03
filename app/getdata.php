<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class getdata extends Model
{
    public static function getcountry(){

        $value=DB::table('countries')->get(); 
        return $value;
    }

    public static function getstate($getstate=0){

        $value=DB::table('states')->where('country_id',$getstate)->get(); 
        return $value;
    }
}
