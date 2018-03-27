@extends('layouts.front')
@section('title')
	Register
@endsection

@section('appendCss')
	@parent
@endsection

@section('content')
<div class="container">
	<div class="reg">
		<h3>Register Now</h3>
		<p>Welcome, please enter the following details to continue.</p>
		<p>If you have previously registered with us, <a href="index.php?page=signup">click here</a></p>
		 <form action="{{ route('registered') }}" method="POST" enctype="multipart/form-data" >
		 	{{ csrf_field() }}
            <ul>
                <li class="text-info">User Name: </li>
                <li><input type="text" id="user" name="user" value="{{ old('user') }}" onBlur="klikUser()"></li>
            </ul>
			<ul>
				<li class="text-info">First Name: </li>
				<li><input type="text" id="fName" name="fName" value="{{ old('fName') }}" onBlur="klikFirst()"></li>
			</ul>
			<ul>
				<li class="text-info">Last Name: </li>
				<li><input type="text" id="lName" name="lName" value="{{ old('lName') }}" onBlur="klikLast()"></li>
			 </ul>				 
			<ul>
				<li class="text-info">Email: </li>
				<li><input type="text" id="email" name="email" value="{{ old('email') }}" onBlur="klikEmail()"></li>
			</ul>
			<ul>
				<li class="text-info">Password: </li>
				<li><input type="password" id="pw" name="pw" value="{{ old('pw') }}" ></li>
			</ul>
			<ul>
				<li class="text-info">Re-enter Password:</li>
				<li><input type="password" id="rePw" name="rePw" value="{{ old('rePw') }}"></li>
			</ul>
			<ul>
				<li class="text-info">Profile photo:</li>
				<li><input type="file" value="Choose photo" name="profile"/></li>
			</ul>						
			<input type="submit" value="Register Now" name="registration">
			<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p> 
		</form>
	</div>
</div>
@endsection