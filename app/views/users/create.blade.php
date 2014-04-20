@extends('layouts.user')
@section('main')
<h1>Add To Do </h1>
{{ Form::open(array('route' => 'users.store','onsubmit'=>'return checkform(this)')) }}
<ul>
<li>
{{ Form::label('name', 'To do Name:') }}
{{ Form::text('name') }}
</li>
<li>
{{ Form::label('date', 'Deadline Date:') }}
{{ Form::text('date','yyyy-mm-dd') }}<span class="error" id='dateerr'> </span>
</li>
<li>
{{ Form::label('time', 'Deadline Time:') }}
{{ Form::text('time','hh:mm pm') }}<span class="error" id='timeerr'> </span>
</li>
<li>
{{ Form::label('priority', 'Priority:') }}
{{ Form::select('priority', array(
  'Low' => 'Low',
  'Medium' => 'Medium',
  'High' => 'High'), 'Low') }}
</li>
<li>
{{ Form::label('status', 'Status:') }}
{{ Form::select('status', array(
  'Incomplete' => 'Incomplete',
  'Complete' => 'Complete'), 'Incomplete') }}
</li>
<li>
{{ Form::submit('Submit', array('class' => 'btn')) }}
</li>
</ul>
{{ Form::close() }}

<script type="text/javascript">
function checkform (form)
{
document.getElementById("dateerr").innerHTML="  ";
document.getElementById("timeerr").innerHTML="  ";
if(form.name.value=="")
{
	alert("Enter To do Name");
	form.name.focus();
	return false;
}
var myString = form.date.value; 
var myArray = myString.split('-');
if(myString.length!=10)
{
	document.getElementById("dateerr").innerHTML=" * Enter date in yyyy-mm-dd format";
	form.date.focus();
	return false;
}
if(myArray[1]=='mm' || myArray[2]=='dd' ||myArray[0]=='yyyy')
{	
	alert("Enter Date");
	form.date.focus();
	return false;
}
if(myArray[1]>12 || myArray[2]>31 ||myArray[1]==0 ||myArray[2]==0|| myArray[0]==0)
{	
	alert("Invalid Date");
	document.getElementById("dateerr").innerHTML=" * Enter date in yyyy-mm-dd format";
	form.date.focus();
	return false;
}

var myString = form.time.value; 
var myArray = myString.split(':');
var minArray = myArray[1].split(' ');
if(myArray[0]=='hh'||minArray[0]=='mm' )
{
	document.getElementById("timeerr").innerHTML=" * Enter time in hh:mm am/pm format";
	form.time.focus();
	return false;
}

if(myString.length!=8||minArray[0]>59 ||minArray[0]<0||myArray[0]>12 ||myArray[0]<0)
{	
	alert("Invalid Time");
	document.getElementById("timeerr").innerHTML=" * Enter time in hh:mm am/pm format";
	form.time.focus();
	return false;
}
return true;
}
</script>
@stop