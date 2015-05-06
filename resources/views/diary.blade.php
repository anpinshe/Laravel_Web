@extends('layout')
@section('content')
    <div id="main-wrapper">
        @if(Auth::check())
        <div id="main" class="container">
            <div class="row">
                <!-- Content -->
                <div id="content" class="8u">
                    <!-- Post -->
                    <article class="box post">
                        <header>
                            <h2><a>{{$diary->title}}</a></h2>
                        </header>
                        <a class="image featured"><img src="images/book2.jpg" alt="" /></a>
                        <h3>{{$diary->date}}</h3>
                        <p>
                            {{$diary->content}}
                        </p>
                    </article>
                </div>
            </div>
        </div>
        @else
            <p class="notice">Hello, Guest. Please <a href="{{url('login')}}">Login</a> or <a href="{{url('signup')}}">Sign Up</a> </p>
        @endif
    </div>
@stop
