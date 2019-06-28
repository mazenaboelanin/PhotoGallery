<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    //
    public function index(){
        return view('albums.index');
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

        return $path;
    }
}
