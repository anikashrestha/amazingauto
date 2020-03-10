<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;
use App\Galleryindex;

class GalleryindicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $galleryindex = Galleryindex::all();
        return view('admin/galleryindices/index')->with('galleryindex',$galleryindex);
    }
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('/admin/galleryindices/create');
    }    
    public function store(Request $request){
        $this->validate($request,[
            'car' => 'required',
            'carphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'price' => 'required'
           ]);
   
           $image = $request->file('carphoto');
   
           //Get Filename with extension
           $filenameWithExt = $image->getClientOriginalName();
   
           //Get just the filename
   
           $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
   
           //Get extension
           $extension = $image->getClientOriginalExtension();
   
           //Create new filename
           $filenameToStore = $filename.'_'.time().'.'.$extension;
   
           //Upload logo
           $path = $image->storeAs('public/car',$filenameToStore);
   
           $galleryindex = new Galleryindex;
           $galleryindex->car = $request->input('car');
           $galleryindex->carphoto = $filenameToStore;
           $galleryindex->price = $request->input('price');
           $galleryindex->status = $request->has('status');
   
           $galleryindex->save();
   
           return redirect('/admin/galleryindices')->with('success','Car Photo Created');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $galleryindex = Galleryindex::find($id);
        return view('admin/galleryindices/edit')->with('galleryindex',$galleryindex);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'car' => 'required',
            'carphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'price' => 'required'
           ]);
         
           $galleryindex = Galleryindex::find($id);
       
           if($request->hasFile('carphoto')){
            $image = $request->file('carphoto');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload banner
            $path = $image->storeAs('public/car',$filenameToStore);
            if(Storage::delete('public/car/'.$galleryindex->carphoto.'/')){
                File::delete($galleryindex->carphoto);           
              }
   
             
              $galleryindex->carphoto = $filenameToStore;
              $galleryindex->save();
           }          
           $galleryindex->car = $request->input('car');
           $galleryindex->price = $request->input('price');
           $galleryindex->status = $request->has('status');          
           $galleryindex->save();

        

           return redirect('/admin/galleryindices')->with('success','Banners Edited');
        
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $galleryindex = Galleryindex::find($id);
        $galleryindex->delete();
        return redirect('/admin/galleryindices')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $carphoto = Galleryindex::where('car','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/galleryindices/search')->with('galleryindicessearch', $brandicon);
  
    }
}
