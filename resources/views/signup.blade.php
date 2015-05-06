@extends('layout')
@section('content')
    <div id="signup">
    <h1>Sign Up</h1>
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    <form method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_conformation">Confirm Password</label>
            <input type="password" id="password_conformation" name="password_confirmation" class="form-control">
        </div>

        <input type="submit" value="Sign Up" class="btn btn-primary">
    </form>
    <div>
@stop
