<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spare;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;

class SparesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $spares = Spare::all();
        return view('admin/spares/index')->with('spares',$spares);
    }
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('/admin/spares/create');
    }    
    public function store(Request $request){
        $this->validate($request,[
         'title' => 'required',
         'spareimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ]);

        $image = $request->file('spareimage');

        //Get Filename with extension
        $filenameWithExt = $image->getClientOriginalName();

        //Get just the filename

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $image->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload logo
        $path = $image->storeAs('public/spares',$filenameToStore);

        $spare = new Spare;
        $spare->title = $request->input('title');
        $spare->spareimage = $filenameToStore;
        $spare->status = $request->has('status');

        $spare->save();

        return redirect('/admin/spares')->with('success','Spare parts Created');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $spare = Spare::find($id);
        return view('admin/spares/edit')->with('spare',$spare);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
            'spareimage' => 'image|max:2000'
           ]);
         
           $spare = Spare::find($id);

           if($request->hasFile('spare')){
            $image = $request->file('spare');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload logo
            $path = $image->storeAs('public/spares',$filenameToStore);

            if(Storage::delete('public/spares/'.$spare->spareimage.'/')){
                File::delete($spare->spareimage);           
              }
   
             
              $spare->spareimage = $filenameToStore;
              $spareimage->save();
           }   
           $spare->title = $request->input('title');
           $spare->status = $request->has('status');           
           $spare->save();
           return redirect('/admin/spares')->with('success','Spare Parts Edited');
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $spare = Spare::find($id);
        $spare->delete();
        return redirect('/admin/spares')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $spareimage = Spare::where('name','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/spares/search')->with('spareimagesearch', $spareimage);
  
    }

}
