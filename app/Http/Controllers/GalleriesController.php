<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;


class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $albums = Album::with('Photos')->get();
        return view('admin/gallery/index')->with('albums',$albums);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('admin/gallery/create');
    }


    public function store(Request $request){
        $this->validate($request,[
        'name' => 'required',
        'cover_image' => 'image|max:5000'
        ]);
        
        $image = $request->file('cover_image');

      
       //Get Filename with extension
         $filenameWithExt = $image->getClientOriginalName();


           //Get just the filename
           $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //Get extension
            $extension = $image->getClientOriginalExtension();

              
        // Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        
        //Upload image
        $path = $image->storeAs('public/album_covers',$filenameToStore);
     
        $albums = new Album;
        $albums->name = $request->input('name');
        $albums->description = $request->input('description');
        $albums->cover_image = $filenameToStore;
        $albums->save();    
    
        return redirect('/admin/gallery')->with('success','Album Created');
       
    
        }

        public function result(Request $request){
            $request->user()->authorizeRoles(['Admin', 'User']);
            $request->validate([
                'query' => 'required|min:3'
              ]);
         $query = $request->input('query');
            $gallerysearch = Album::where('name','LIKE','%' .$query. '%')
            ->get();
            return view('admin/gallery/search')->with('gallerysearch', $gallerysearch);
        
            
        }

        public function show(Request $request,$id){
            $request->user()->authorizeRoles(['Admin','User']);
            $album = Album::with('Photos')->findOrFail($id);

         
            return view('admin/gallery/show')->with('album',$album);
    
           

        }

        public function destroy(Request $request,$id){
            $request->user()->authorizeRoles(['Admin']);
            $album = Album::find($id);
        
             if(Storage::delete('public/album_covers/'.$album->cover_image.'/')){
               
                if(Storage::delete('public/photos/'.$album->id.'/')){
                    $album->photos()->delete();
                }

                $album->delete();
             }
            return redirect('/admin/gallery')->with('success','Delete Successfully');
        }

        public function edit(Request $request,$id){
            $request->user()->authorizeRoles(['Admin']);
            $album = Album::find($id);
            return view('admin/gallery/edit')->with('album',$album);
        }

        public function update(Request $request,$id){
            $this->validate($request,[
                'name' => 'required',
                'cover_image' => 'image|max:5000'
                ]);
                $album = Album::find($id);

                
                if($request->hasFile('cover_image')){
                    $image = $request->file('cover_image');
      
                    //Get Filename with extension
                      $filenameWithExt = $image->getClientOriginalName();
             
             
                        //Get just the filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
             
                         //Get extension
                         $extension = $image->getClientOriginalExtension();
             
                           
                     // Create new filename
                     $filenameToStore = $filename.'_'.time().'.'.$extension;
                     
                     //Upload image
                     $path = $image->storeAs('public/album_covers',$filenameToStore);
                    
                   
                    if(Storage::delete('public/album_covers/'.$album->cover_image.'/')){
                      File::delete($album->cover_image);           
                    }
                    $album->cover_image = $filenameToStore;
                    $album->save();
                }
              
                 $album->name = $request->input('name');
                 $album->description = $request->input('description');
               
                $album->save();
                
                return redirect('/admin/gallery')->with('success','Album Edited');
        }


    


}
