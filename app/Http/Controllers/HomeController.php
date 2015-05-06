<?php namespace App\Http\Controllers;
use App\Models\Calendar;
use App\Models\Diary;
use \Cache;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $d = strtotime("today");
        $day1 = (new Calendar())->search(date("Y-m-d",$d));
        $d = strtotime("today+1day");
        $day2 = (new Calendar())->search(date("Y-m-d",$d));
        //dd(date("Y-m-d",$d));
        $d = strtotime("today+2day");
        $day3 = (new Calendar())->search(date("Y-m-d",$d));
        $d = strtotime("today+3day");
        $day4 = (new Calendar())->search(date("Y-m-d",$d));
        $d = strtotime("today+4day");
        $day5 = (new Calendar())->search(date("Y-m-d",$d));
        $d = strtotime("today+5day");
        $day6 = (new Calendar())->search(date("Y-m-d",$d));
        $d = strtotime("today+6day");
        $day7 = (new Calendar())->search(date("Y-m-d",$d));

        $first = (new Calendar())->getFirst();
        $now = strtotime("today");
        $n = date("Y-m-d",$now);
        $firstD = $first->date;
        $timeleft = $firstD-$n;

        $daysleft = round((($timeleft/24)/60)/60);

        $tag = "cutecats";
        if(Cache::has("instagram-$tag")){
            $jsonString = Cache::get("instagram-$tag");
        }else {
            $url = "https://api.instagram.com/v1/tags/$tag/media/recent?client_id=4d9a72e9dcd845bebbea6c6cda1ad590&limit=2";
            $jsonString = file_get_contents($url);
            Cache::put("instagram-$tag", $jsonString, 10);
        }

        $pic = json_decode($jsonString);

        $diaries = (new Diary())->getFirst();

		return view('home', [
            'day1' => $day1,
            'day2' => $day2,
            'day3' => $day3,
            'day4' => $day4,
            'day5' => $day5,
            'day6' => $day6,
            'day7' => $day7,
            'daysleft' => $daysleft,
            'first' => $first,
            'instagrams' => $pic->data,
            'diaries' => $diaries
        ]);
	}

}
