@extends('layouts.scaffold')

@section('main')

<h1>All Dogs</h1>

<p>{{ link_to_route('dogs.create', 'Add new dog') }}</p>

@if ($dogs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($dogs as $dog)
				<tr>
					<td>{{{ $dog->name }}}</td>
					<td>{{{ $dog->age }}}</td>
                    <td>{{ link_to_route('dogs.edit', 'Edit', array($dog->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('dogs.destroy', $dog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no dogs
@endif

@stop
