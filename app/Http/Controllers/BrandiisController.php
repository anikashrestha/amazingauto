<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;
use App\Brandii;

class BrandiisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $brandiis = Brandii::all();
        return view('admin/brandii/index')->with('brandiis',$brandiis);
    }
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('/admin/brandii/create');
    }    
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'brandicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
           ]);
   
           $image = $request->file('brandicon');
   
           //Get Filename with extension
           $filenameWithExt = $image->getClientOriginalName();
   
           //Get just the filename
   
           $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
   
           //Get extension
           $extension = $image->getClientOriginalExtension();
   
           //Create new filename
           $filenameToStore = $filename.'_'.time().'.'.$extension;
   
           //Upload logo
           $path = $image->storeAs('public/brandii',$filenameToStore);
   
           $brandii = new Brandii;
           $brandii->name = $request->input('name');
           $brandii->brandicon = $filenameToStore;
           $brandii->status = $request->has('status');
   
           $brandii->save();
   
           return redirect('/admin/brandii')->with('success','Brands Created');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $brandii = Brandii::find($id);
        return view('admin/brandii/edit')->with('brandii',$brandii);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'brandicon' => 'image|max:2000'
           ]);
         
           $brandii = Brandii::find($id);

           if($request->hasFile('brandicon')){
            $image = $request->file('brandicon');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload logo
            $path = $image->storeAs('public/brandii',$filenameToStore);

            if(Storage::delete('public/brandii/'.$brandii->brandicon.'/')){
                File::delete($brandii->brandicon);           
              }
   
             
              $brandii->brandicon = $filenameToStore;
              $brandii->save();
           }   
           $brandii->name = $request->input('name');
           $brandii->status = $request->has('status');           
           $brandii->save();
           return redirect('/admin/brandii')->with('success','Brands Edited');
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $brandii = Brandii::find($id);
        $brandii->delete();
        return redirect('/admin/brandii')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $brandicon = Brandii::where('name','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/brandindex/search')->with('brandindexsearch', $brandicon);
  
    }
}
