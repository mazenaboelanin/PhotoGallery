@extends('layouts.app')

@section('content')
    <h3>Upload Photo</h3>

    {!! Form::open(['action'=>'PhotosController@store' , 'method' => 'POST' , 'enctype' =>'multipart/form-data']) !!} 

        {{Form::bsText('title' ,'', ['class'=>'form-control', 'placeholder' => 'Photo Name'] ) }}
        {{Form::bsTextArea('description' ,'',['class'=>'form-control','placeholder' =>'Photo Description'])}}
        {{Form::hidden('album_id' , $album_id)}}
        {{Form::bsFile('photo')}}
        {{Form::bsSubmit('submit' , ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection