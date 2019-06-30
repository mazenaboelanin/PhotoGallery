<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    //
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums' , $albums);
    }

    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){

        //Validation
        $this->validate($request , [

            'name' => 'required',
            'cover_image' => 'image|max:1999',//max upload size = 2MB so we made it 1999kb
        ]);      

        //get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName(); 
        //get just the file name
        $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
        //get extension of the file
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //create new filename with time to make it unique
        $filenameToStore = $filename . '_'. time() . '.' . $extension ;

        //upload image 
        $path = $request->file('cover_image')->storeAs('public/album_covers' , $filenameToStore);

        //Create Album 
        $album = new Album;  
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();


        return redirect('/albums')->with('success' , 'Album Created');
      }

      public function show($id){

        //fetching album by id
        $album = Album::with('Photos')->findOrFail($id);

        return view('albums.show')->with('album' , $album);
      }
}
