<?php namespace App\Models;

use DB;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model{
    public function search($date){
        $query = DB::table('calendars')
            ->where('date', '=', $date)
            ->first();

        return $query;
    }
    public static function validateDate($input){
        return Validator::make($input, [
           'date' => 'required|date_format:Y-m-d|after:today'
        ]);
    }
    public static function validateCal($input){
        return Validator::make( $input, [
            'date' => 'exists:calendars,date',
           'weather' => 'required',
            'note' => 'required'
        ]);
    }
    public static function validateNewCal($input){
        return Validator::make( $input, [
            'date' => 'required|unique:calendars|date_format:Y-m-d|after:today',
            'weather' => 'required',
            'note' => 'required'
        ]);
    }
    public static function findId($input){
        $query = DB::table('calendars')
            ->where('date','=',$input)
            ->first();
        return $query->id;
    }
    public static function getFirst(){
        $today = strtotime("today");
        $t = date("Y-m-d",$today);
        $query = DB::table('calendars')
            ->where('date','>=',$t)
            ->first();
        return $query;
    }
}