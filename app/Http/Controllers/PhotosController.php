<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
class PhotosController extends Controller
{
    //

    public function create($album_id){

        return view('Photos.create')->with('album_id' , $album_id);
    }

    public function store(Request $request){

        //Validation
        $this->validate($request , [

            'title' => 'required',
            'photo' => 'image|max:1999',//max upload size = 2MB so we made it 1999kb
        ]);      

        //get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName(); 
        //get just the file name
        $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
        //get extension of the file
        $extension = $request->file('photo')->getClientOriginalExtension();

        //create new filename with time to make it unique
        $filenameToStore = $filename . '_'. time() . '.' . $extension ;

        //upload image 
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id') , $filenameToStore);

        //Upload Photo 
        $photo = new Photo;  
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
    
        $photo->photo = $filenameToStore;

        $photo->save();


        return redirect('/albums/'.$request->input('album_id'))->with('success' , 'Photo Uploaded');
      

    }

}
