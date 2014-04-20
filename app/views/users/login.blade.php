@extends('layouts.user')
@section('main')
<script type="text/javascript">
function checkform (form)
{
document.getElementById("emailerr").innerHTML="  ";
document.getElementById("passworderr").innerHTML="  ";
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(! form.email.value.match(mailformat))
{
	document.getElementById("emailerr").innerHTML=" * Invalid email address";
	form.email.focus();
	return false;
}
if(form.password.value=="")
{

	document.getElementById("passworderr").innerHTML=" * Enter your password";
	form.password.focus();
	return false;
}
return true;
}
</script>
<h3 style="text-align:right;">For Sign up {{ link_to_route('signup.index', 'Click Here') }}</h3>
<h3>Members Login</h3>
{{ Form::open(array('route' => 'login.store','onSubmit'=>'return checkform(this)')) }}
<ul>
<li>
{{ Form::label('email', 'Email:') }}
{{ Form::text('email'); }}<span class="error" id='emailerr'> </span>
</li>
<li>
{{ Form::label('password', 'Password:') }}
{{ Form::password('password') }}<span class="error" id='passworderr'>  </span>
</li>
<li>
<input type="submit" name="submit" value="login" />
</li>
</ul>
{{ Form::close() }}
@stop
