@extends('layouts.scaffold')

@section('main')

<h1>Edit Dog</h1>
{{ Form::model($dog, array('method' => 'PATCH', 'route' => array('dogs.update', $dog->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('age', 'Age:') }}
            {{ Form::input('number', 'age') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('dogs.show', 'Cancel', $dog->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
