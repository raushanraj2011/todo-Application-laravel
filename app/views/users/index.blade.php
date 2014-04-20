@extends('layouts.user')
@section('main')
<h2><?php echo "Welcome $_COOKIE[name]"; ?></h2><h4 style="text-align:right;">{{ link_to_route('signup.create', 'Logout') }}</h4>
<p>{{ link_to_route('users.create', 'Add new todo') }}</p>
<?php $slno=1; ?>
@if ($users->count())
<table class="table table-striped table-bordered">
	<thead>
<tr>
<th>Sl.no</th>
<th>Name </th>
<th>Deadline Time</th>
<th>Deadline Date</th>
<th>Priority</th>
<th>Status</th>
<th>Perform</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
<td>{{ $slno}}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->time}} </td>
<td>{{ $user->date }}</td>
<td>{{ $user->priority }}</td>
<td>{{ $user->status}}</td>
<td>{{ link_to_route('users.edit', 'Edit', 
array($user->todo_id), array('class' => 'btn btn-info')) }}</td>
<td>
{{ Form::open(array('method' 
=>  'DELETE',  'route'  =>  array('users.destroy',  $user->todo_id)))  }} 
{{ Form::submit('Delete', array('class' => 
'btn btn-danger')) }}
{{ Form::close() }}
</td>
</tr>
<?php $slno++; ?>
@endforeach
</tbody>
</table>
@else
There are no list
@endif
@stop