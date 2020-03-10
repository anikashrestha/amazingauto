<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;


class LogosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $logos = Logo::all();
        return view('admin/logos/index')->with('logos',$logos);
    }
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('/admin/logos/create');
    }    
    public function store(Request $request){
        $this->validate($request,[
         'title' => 'required',
         'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ]);

        $image = $request->file('logo');

        //Get Filename with extension
        $filenameWithExt = $image->getClientOriginalName();

        //Get just the filename

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $image->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload logo
        $path = $image->storeAs('public/logos',$filenameToStore);

        $logo = new Logo;
        $logo->title = $request->input('title');
        $logo->logo = $filenameToStore;
        $logo->status = $request->has('status');

        $logo->save();

        return redirect('/admin/logos')->with('success','logos Created');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $logo = Logo::find($id);
        return view('admin/logos/edit')->with('logo',$logo);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
            'logo' => 'image|max:2000'
           ]);
         
           $logo = Logo::find($id);

           if($request->hasFile('logo')){
            $image = $request->file('logo');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload logo
            $path = $image->storeAs('public/logos',$filenameToStore);

            if(Storage::delete('public/logos/'.$logo->logo.'/')){
                File::delete($logo->logo);           
              }
   
             
              $logo->logo = $filenameToStore;
              $logo->save();
           }   
           $logo->title = $request->input('title');
           $logo->status = $request->has('status');           
           $logo->save();
           return redirect('/admin/logos')->with('success','logos Edited');
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $logo = Logo::find($id);
        $logo->delete();
        return redirect('/admin/logos')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $logosearch = Logo::where('name','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/logos/search')->with('logosearch', $logosearch);
  
    }



}
