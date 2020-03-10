<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;
use App\Banner;

class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $banner = Banner::all();
        return view('admin/banners/index')->with('banners',$banner);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('/admin/banners/create');
    }

    
    public function store(Request $request){
        $this->validate($request,[
         'name' => 'required',
         'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000'
        ]);

        $image = $request->file('banner');

        //Get Filename with extension
        $filenameWithExt = $image->getClientOriginalName();

        //Get just the filename

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $image->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload banner
        $path = $image->storeAs('public/banners',$filenameToStore);

        $banner = new Banner;
        $banner->name = $request->input('name');
        $banner->banner = $filenameToStore;
        $banner->status = $request->has('status');

        $banner->save();

        return redirect('/admin/banners')->with('success','Banners Created');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $banner = Banner::find($id);
        return view('admin/banners/edit')->with('banner',$banner);

    }


    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'banner' => 'image|max:2000'
           ]);
           $banner = Banner::find($id);
       
           if($request->hasFile('banner')){
            $image = $request->file('banner');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload banner
            $path = $image->storeAs('public/banners',$filenameToStore);
            if(Storage::delete('public/banners/'.$banner->banner.'/')){
                File::delete($banner->banner);           
              }
   
             
              $banner->banner = $filenameToStore;
              $banner->save();
           }
         
           
          
           $banner->name = $request->input('name');
           $banner->status = $request->has('status');

   

           
           
           $banner->save();

        

           return redirect('/admin/banners')->with('success','Banners Edited');
        

    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('/admin/banners')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
       
       $pages = Page::all();
        $query = $request->input('query');
        $bannersearch = Banner::where('name','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/banners/search')->with('bannersearch', $bannersearch)->with('pages',$pages);
  
    }


}
