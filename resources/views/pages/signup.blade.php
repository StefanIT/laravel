@extends('layouts.front')

@section('title')
    SignUp
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
@endsection


@section('content')
<!--signup-->
<!-- login-page -->
<div class="login">
    <div class="container">
        <div class="login-grids">
            <div class="col-md-6 log">
                    <h3>Login</h3>
                    <div class="strip"></div>
                    <p>Welcome, please enter the following to continue.</p>
                    <p>If you have previously Login with us, <a href="#">Click Here</a></p>
                    <form action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <h5>User Name:</h5>	
                        <input type="text" name="user" value="{{ old('user') }}">
                        <h5>Password:</h5>
                        <input type="password" name="password" value="{{ old('password') }}"><br>					
                        <input type="submit" name="login" value="Login">
                         
                    </form>
                    <span id="hideBox"></span>
                    <a href="#">Forgot Password ?</a>
                    
            </div>
            <div class="col-md-6 login-right">
                    <h3>New Registration</h3>
                    <div class="strip"></div>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a href="index.php?page=register" class="button">Create An Account</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection