@extends('layout')
@section('content')
    <!-- Features -->
    <div id="features-wrapper">
        <section id="features" class="container">
            <header>
                <h2>Today, Tomorrow and ... <strong>Are you free this week?</strong>!</h2>
            </header>
            <div>
                <section style="background-color: aliceblue">
                    <a href="#" class="image featured"><img src="
                    @if($day1==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day1->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("today");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day1==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day1->note}}</p>
                    @endif
                </section>
                <section style="background-color: antiquewhite">
                    <a href="#" class="image featured"><img src="
                    @if($day2==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day2->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("tomorrow");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day2==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day2->note}}</p>
                    @endif
                </section>
                <section style="background-color: aliceblue">
                    <a href="#" class="image featured"><img src="
                    @if($day3==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day3->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("tomorrow+1day");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day3==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day3->note}}</p>
                    @endif
                </section>
                <section style="background-color: antiquewhite">
                    <a href="#" class="image featured"><img src="
                    @if($day4==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day4->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("tomorrow+2day");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day4==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day4->note}}</p>
                    @endif
                </section>
                <section style="background-color: aliceblue">
                    <a href="#" class="image featured"><img src="
                    @if($day5==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day5->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("tomorrow+3day");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day5==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day5->note}}</p>
                    @endif
                </section>
                <section style="background-color: antiquewhite">
                    <a href="#" class="image featured"><img src="
                    @if($day6==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day6->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("tomorrow+4day");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day6==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day6->note}}</p>
                    @endif
                </section>
                <section style="background-color: aliceblue">
                    <a href="#" class="image featured"><img src="
                    @if($day7==null){{"images/sunny.jpg"}}
                    @else{{"images/".$day7->weather.".jpg"}}
                    @endif
                                " alt="" /></a>
                    <header>
                        <h3><?php $d=strtotime("tomorrow+5day");?>
                            {{date("Y-m-d", $d)}}</h3>
                    </header>
                    @if($day7==null)
                        <p>Nothing important today.</p>
                    @else
                        <p>{{$day7->note}}</p>
                    @endif
                </section>
            </div>
            <ul class="actions">
                <li><a href="/dashboard" class="button icon fa-file">Goto Calendar</a></li>
            </ul>
        </section>
    </div>

    <!-- Banner -->
    <div id="banner-wrapper">
        <div class="inner">
            <section id="banner" class="container">
                <p>Dear Anpin, Your next assignment<br/> <strong>
                        @if($first==null){{"Upcoming Event"}}
                        @else{{$first->note}}
                        @endif
                    </strong>.<br />
                    Will be due in <strong>
                        @if($first==null){{"0"}}
                        @else{{$daysleft}}
                        @endif
                    </strong> days</p>
            </section>
        </div>
    </div>

    <div id="pics">
        @foreach($instagrams as $instagram)
            <img src="{{$instagram->images->low_resolution->url}}">
        @endforeach
    </div>
    <!-- Main -->
    <div id="main-wrapper">
        <div id="main" class="container">
            <div class="row">

                <!-- Content -->
                <div id="content" class="8u">
                    <!-- Post -->
                    <article class="box post">
                        <header>
                            <h2><a href="{{"/diary".$diaries->id}}">{{$diaries->title}}</a></h2>
                        </header>
                        <a class="image featured"><img src="images/book.jpg" alt="" /></a>
                        <h3>{{$diaries->date}}</h3>
                        <p>
                            {{$diaries->content}}
                        </p>
                        <ul class="actions">
                            <li><a href="{{"/diary".$diaries->id}}" class="button icon fa-file">Continue Reading</a></li>
                        </ul>
                    </article>

                </div>


            </div>
        </div>
    </div>
@stop