@extends('layouts.app')

@section('content')

<h1>{{$album->name}}</h1>
<a href="/" class="btn btn-default">Go Back</a>
<a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photo To Album</a>

<hr>

@if( count($album->photos) > 0 )
<?php
    $colcount = count($album->photos);
    $i = 1 ;
?>
<div id="photos">
    <div class="row text-center">
        @foreach($album->photos as $photo)
            @if($i == $colcount)
                <div class="col-md-4">
                    <a href="/photos/{{$photo->id}}">
                    <img style="height:50%; width:100%"  class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                    </a>
                    <br>
                    <h4>{{$photo->title}}</h4>
            @else 
                <div class="col-md-4">
                    <a href="/photos/{{$photo->id}}">
                        <img style="height:50%; width:100%"  class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                        </a>
                        <br>
                        <h4>{{$photo->title}}</h4>
            
            @endif

            @if($i % 3 == 0)
            </div></div><div class="row text-center">
            @else
            </div>
            @endif
            <?php $i++ ; ?>
        @endforeach
    </div>
</div>
@else 
<br><br>
<p>No Photo to Display</p>
@endif
@endsection