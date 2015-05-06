@extends('layout')
@section('content')
    <div id="newCalendar">
        @if(Auth::check())
            <h1>Create your Diary</h1>
            @foreach ($errors->all() as $errorMessage)
                <p> {{ $errorMessage }} </p>
            @endforeach
            <form method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" value="{{Request::old('date')}}">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" maxlength="40" value="{{Request::old('title')}}">
                </div>
                <div class="form-group">
                    <label for="diary">Diary</label>
                    <textarea name="diary" id="diary" cols="40" rows="20">{{Request::old('diary')}}</textarea>
                </div>

                <input id="insert" type="submit" value="Insert" class="btn btn-primary">
            </form>
        @else
            <p class="notice">Hello, Guest. Please <a href="{{url('login')}}">Login</a> or <a href="{{url('signup')}}">Sign Up</a> </p>
        @endif
    </div>

@stop