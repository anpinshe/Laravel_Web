<?php

use App\User;
use App\Models\Calendar;
use App\Models\Diary;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get("home", 'HomeController@index' );
Route::get('/','WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route:get('signup', function(){
    return view('signup');
});
Route::post('signup', function(){
    $validation = User::validate(Request::all());
    if($validation->passes()) {
        $user = new User();
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->password = Hash::make(Request::input('password'));
        $user->save();
        return redirect('login');
    }

    return redirect('signup')->withErrors($validation->errors());
});
Route::get('login', function(){
    return view('login');
});
Route::post('login', function(){
    $credentials = [
        'name' => Request::input('name'),
        'password'=> Request::input('password')
    ];
   if(Auth::attempt($credentials)){
       return redirect('dashboard');
   }
    return redirect('login');
});
Route::get('dashboard', function(){
    $calendars = Calendar::all();
    $diaries = Diary::all();
    if(Auth::check()) {
        return view('dashboard',[
            'calendars'=> $calendars,
            'diaries' => $diaries
        ]);
    }
    return redirect('login');
});
Route::get('logout', function(){
    Auth::logout();
    return redirect('home');
});
Route::get('createCalendar','CalendarController@create');
Route::get('createDiary', function(){
    return view('createDiary');
});
Route::post('createDiary','DiaryController@insert');
Route::post('createCalendar', 'CalendarController@getCal');
Route::get('modifyCalendar{date}', function($date){
   return view('modifyCalendar', [
       'date' => $date
   ]);
});
Route::get('newCalendar{date}', function($date){
    $weather = array('sunny','cloudy','windy','snowy','rainy');
    return view('newCalendar',[
        'weathers' => $weather,
        'date' =>$date
    ]);
});
Route::post('newCalendar{date}', 'CalendarController@insert');
Route::get('Calendar{date}', function($date){
    $weather = array('sunny','cloudy','windy','snowy','rainy');
    $result = (new Calendar())->search($date);
    return view('modifyCalendar', [
        'weather'=>$weather,
        'result'=>$result,
        'date' => $date
    ]);
});
Route::post('Calendar{date}', 'CalendarController@modify');
Route::get('delete{id}', function($id){
    $cal = Calendar::find($id);
    $cal->delete();
    return redirect('dashboard');
});
Route::get('diary{id}', function($id){
   $d = Diary::find($id);
    return view('diary',[
       'diary' => $d
    ]);
});

