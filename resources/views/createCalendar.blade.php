@extends('layout')
@section('content')
    <div id="createCalendar">
        @if(Auth::check())
        <h1>Modify your Calendar</h1>
        @foreach ($errors->all() as $errorMessage)
            <p> {{ $errorMessage }} </p>
        @endforeach
        <form method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group">
                <label for="day">Date</label>
                <input type="date" name="date" value="{{Request::old('date')}}">
            </div>

            <input id="search" type="submit" value="Get Date" class="btn btn-primary">
        </form>
        @else
            <p class="notice">Hello, Guest. Please <a href="{{url('login')}}">Login</a> or <a href="{{url('signup')}}">Sign Up</a> </p>
        @endif
    </div>

@stop