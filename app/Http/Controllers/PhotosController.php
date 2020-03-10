<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PhotosController extends Controller
{
    public function create(Request $request,$album_id){
        $request->user()->authorizeRoles(['Admin']);
        $album = Album::find($album_id);
        return view('admin/photos/create')->with('album', $album);
    
    }
    
    public function store(Request $request){
       
            if($request->hasFile('photo')){
                $images = $request->file('photo');
    
                foreach($images as $image){
      //Get Filename with extension
      $filenameWithExt = $image->getClientOriginalName();
    //Get just the filename
    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
    //Get extension
    $extension = $image->getClientOriginalExtension();
    
     // Create new filename
     $filenameToStore = $filename.'_'.time().'.'.$extension;
    
    
    
        $path = $image->storeAs('public/photos/'.$request->input('album_id'),$filenameToStore);
        $data[] = $filenameToStore;  
            //Upload Photo
            $photos = new Photo;
            $photos->album_id = $request->input('album_id');
            // $photos->title = $request->input('title');
            // $photos->description = $request->input('description');
            $photos->photo = $filenameToStore;
          
            $photos->save();    
    
    
    
    }
            }
        
        
            return redirect('/admin/gallery/'.$request->input('album_id'))->with('success','Photo Uploaded');
           
           
    }
    
    public function show(Request $request,$id){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $photo = Photo::find($id);
        return view('admin/photos/show')->with('photo',$photo);
    
    }
    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $photo = Photo::find($id);
    
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect('/admin/gallery/'.$photo->album_id.'/')->with('success','Photo Deleted');
        }
    }
    
}
