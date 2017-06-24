@extends('layout')

@section('content')
	<h1>Features</h1>
	{!! Form::model (['method' => 'POST', 'class' => 'form' ]) !!}
		 {!! Field::selectMultiple('features[]', $features, [], ['label' => 'Features']) !!}
		 <button type="submit" class="button btn btn-primary">Save</button>
	{!! Form::close() !!}
@endsection