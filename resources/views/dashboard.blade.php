@extends('layout')
@section('content')
    @if(Auth::check())
    <div id="dashboard">
    <h1>Calendar</h1>
    @if (Session::has('success'))
        <p> {{ Session::get('success') }}</p>
    @endif
    @foreach ($errors->all() as $errorMessage)
        <p> {{ $errorMessage }} </p>
    @endforeach
        <div>
            <table class="table-striped table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Weather</th>
                    <th>Note</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($calendars as $calendar)
                    <tr>
                        <td>{{$calendar->date }}</td>
                        <td>{{$calendar->weather }}</td>
                        <td>{{$calendar->note }}</td>
                        <td>{{ $calendar->created_at }}</td>
                        <td>{{ $calendar->updated_at }}</td>

                        <td><a href="{{"delete".$calendar->id}}">Delete</a></td>
                        <td><a href="{{"Calendar".$calendar->date}}">Modify</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tr><a href="/createCalendar">+ Update Calendar</a></tr>
            </table>
            <h1>Diary</h1>
            <table class="table-striped table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>title</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($diaries as $diary)
                    <tr>
                        <td>{{$diary->date }}</td>
                        <td>{{$diary->title }}</td>
                        <td>{{ $diary->created_at }}</td>
                        <td>{{ $diary->updated_at }}</td>

                        <td><a href="{{"diary".$diary->id}}">See More</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tr><a href="/createDiary">+ Update Diary</a></tr>
            </table>
        </div>
        @else
            <p class="notice">Hello, Guest. Please <a href="{{url('login')}}">Login</a> or <a href="{{url('signup')}}">Sign Up</a> </p>
        @endif
    </div>
@stop