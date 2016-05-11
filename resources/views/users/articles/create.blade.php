@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

	@if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if(Session::has('message'))
        <div class="alert alert-success">
		  {{ Session::get('message') }}
        </div>
	@endif

    {!! Form::open(['action' =>  ['HomeController@store'], 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('CREATE', ['class' => 'btn btn-success form-control']) !!}
        </div>

    {!! Form::close() !!}

        </div>
    </div>
</div>
@stop