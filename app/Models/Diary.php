<?php namespace App\Models;

use DB;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model{
    public static function validateDiary($input){
        return Validator::make($input, [
           'date'=>'required',
            'title' => 'required',
            'diary' => 'required'
        ]);
    }

    public function getFirst(){
        $three = DB::table('diaries')
            ->orderBy('id','desc')
            ->first();
        return $three;
    }


}