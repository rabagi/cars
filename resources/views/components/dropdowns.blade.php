@extends('layout')

@section('content')
	<h1>Dynamic dropdowns</h1>
	{!! Form::open (['method' => 'GET', 'class' => 'form', 'id' => 'search' ]) !!}
		{!! Field::select('make_id', Cars\Models\make::pluck('name', 'id')->toArray()) !!}
		{!! Field::select('makeyear_id', Cars\Models\makeYear::pluck('year', 'id')->toArray()) !!}
		{!! Field::select('model_id', Cars\Models\Model::pluck('name', 'id')->toArray()) !!}
	{!! Form::close() !!}
@endsection