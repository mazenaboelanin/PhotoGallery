@extends('layouts.app')

@section('content')
    <h3>Create Albums</h3>

    {!! Form::open(['action'=>'AlbumsController@store' , 'method' => 'POST' , 'enctype' =>'multipart/form-data']) !!} 

        {{Form::bsText('name' ,'', ['class'=>'form-control', 'placeholder' => 'Album Name'] ) }}
        {{Form::bsTextArea('description' ,'',['class'=>'form-control','placeholder' =>'Album Description'])}}
        {{Form::bsFile('cover_image')}}
        {{Form::bsSubmit('submit' , ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection