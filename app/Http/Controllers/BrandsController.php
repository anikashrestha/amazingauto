<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Expression;
use App\Brand;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $brands = Brand::all();
        return view('admin/brands/index')->with('brands',$brands);
    }
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('/admin/brands/create');
    }    
    public function store(Request $request){
        $this->validate($request,[
         'name' => 'required',
         'brand_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ]);

        $image = $request->file('brand_icon');

        //Get Filename with extension
        $filenameWithExt = $image->getClientOriginalName();

        //Get just the filename

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $image->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload logo
        $path = $image->storeAs('public/brands',$filenameToStore);

        $brand = new Brand;
        $brand->name = $request->input('name');
        $brand->brand_icon = $filenameToStore;
        $brand->status = $request->has('status');

        $brand->save();

        return redirect('/admin/brands')->with('success','Brands Created');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $brand = Brand::find($id);
        return view('admin/brands/edit')->with('brand',$brand);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'brand_icon' => 'image|max:2000'
           ]);
         
           $brand = Brand::find($id);

           if($request->hasFile('brand_icon')){
            $image = $request->file('brand_icon');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload logo
            $path = $image->storeAs('public/brands',$filenameToStore);

            if(Storage::delete('public/brands/'.$brand->brand_icon.'/')){
                File::delete($brand->brand_icon);           
              }
   
             
              $brand->brand_icon = $filenameToStore;
              $brand->save();
           }   
           $brand->name = $request->input('name');
           $brand->status = $request->has('status');           
           $brand->save();
           return redirect('/admin/brands')->with('success','Brands Edited');
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/admin/brands')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $brand_icon = Brand::where('name','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/brands/search')->with('brandsearch', $brand_icon);
  
    }
}
