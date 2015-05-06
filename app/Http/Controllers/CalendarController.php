<?php namespace App\Http\Controllers;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller {
    public function create(){
        $months = array('Jan','Feb','Mar','Apr','May','Jun',
            'Jul','Aug','Sep','Oct','Nov','Dec');
        return view('createCalendar', [
            'months'=>$months,
        ]);
    }
    public function getCal(Request $date){
        $query = $date->input('date');
        $validation = (new Calendar())->validateDate($date->all());
        if($validation->passes()){
            $result = (new Calendar())->search($query);
            if($result) {
                return redirect('Calendar'.$query);
            }
            else{
                return redirect('/newCalendar'.$query);
            }
        }
        return redirect('createCalendar')->withInput()->withErrors($validation);
    }
    public function insert(Request $r){
        $validation = (new Calendar())->validateNewCal($r->all());
        $d = $r->input('date');
        if($validation->passes()){
            $cal = new Calendar();
            $cal->date = $r->input('date');
            $cal->weather = $r->input('weather');
            $cal->note = $r->input('note');
            $cal->save();

            return redirect('dashboard')->with('success', 'Calendar inserted successfully');
        }
        return redirect('/newCalendar'.$d)->withInput()->withErrors($validation);
    }
    public function modify(Request $r){
        $validation = (new Calendar())->validateCal($r->all());
        $d = $r->input('date');
        //dd($d);
        if($validation->passes()){
            $cal= Calendar::find((new Calendar())->findId($d));
            $cal->weather = $r->input('weather');
            $cal->note = $r->input('note');
            $cal->save();
            return redirect('dashboard')->with('success', 'Calendar modified successfully');
        }
        return redirect('dashboard')->withErrors($validation);
    }

}
