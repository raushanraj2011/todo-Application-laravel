@extends('layouts.user')
@section('main')
<script type="text/javascript">
function checkform (form)
{
document.getElementById("emailerr").innerHTML=" *";
document.getElementById("nameerr").innerHTML=" *";
document.getElementById("passworderr").innerHTML=" *";
if(form.name.value=="")
{

	document.getElementById("nameerr").innerHTML=" * Enter Your name";
	form.name.focus();
	return false;
}
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

<h1>Sign up</h1>
<p><span class="error">* required field.</span></p>
{{ Form::open(array('route' => 'signup.store','onSubmit'=>'return checkform(this)')) }}
<ul>
<li>
{{ Form::label('name', 'Name:') }}
{{ Form::text('name') }}<span class="error" id='nameerr'> *</span>
</li>
<li>
{{ Form::label('email', 'Email:') }}
{{ Form::text('email') }}<span class="error" id='emailerr'> *</span>
</li>
<li>
{{ Form::label('password', 'Password:') }}
{{ Form::password('password') }}<span class="error" id='passworderr'> *</span>
</li>
<li>
{{ Form::submit('Register', array('class' => 'btn')) }}
</li>
</ul>
{{ Form::close() }}
@stop