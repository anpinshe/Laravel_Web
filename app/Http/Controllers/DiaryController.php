<?php namespace App\Http\Controllers;
use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller{
    public function insert(Request $r){
        $validation = (new Diary())->validateDiary($r->all());
        if($validation->passes()){
            $diary = new Diary();
            $diary->date = $r->input('date');
            $diary->title = $r->input('title');
            $diary->content = $r->input('diary');
            $diary->save();
            return redirect('dashboard')->with('success', 'Diary inserted successfully');
        }
        return redirect('createDiary')->withInput()->withErrors($validation);
    }
}