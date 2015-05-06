@extends('layout')
@section('content')
    <div id="newCalendar">
        @if(Auth::check())
            <h1>Modify your Calendar</h1>
            @foreach ($errors->all() as $errorMessage)
                <p> {{ $errorMessage }} </p>
            @endforeach
            <form method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" value="{{$date}}">
                </div>
                <div class="form-group">
                    <label for="weather">Weather</label>
                    <select name="weather" id="weather">
                        @foreach($weather as $w)
                            @if($w==$result->weather)
                                <option value="{{$w}}" selected>{{$w}}</option>
                            @else
                                <option value="{{$w}}">{{$w}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" id="note" cols="40" rows="1" maxlength="40">{{$result->note}}</textarea>
                </div>

                <input id="modify" type="submit" value="Modify" class="btn btn-primary">
            </form>
        @else
            <p class="notice">Hello, Guest. Please <a href="{{url('login')}}">Login</a> or <a href="{{url('signup')}}">Sign Up</a> </p>
        @endif
    </div>

@stop