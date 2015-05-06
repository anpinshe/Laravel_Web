@extends('layout')
@section('content')
    <div id="signup">
    <h1>Login</h1>
    <form method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="name">Username</label>
            <input type="name" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
    </div>
@stop