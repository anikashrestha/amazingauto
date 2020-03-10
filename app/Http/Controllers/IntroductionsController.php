<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Introduction;
use File;


class IntroductionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $introductions = Introduction::all();
        return view('admin/introductions/index')->with('introductions',$introductions);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('admin/introductions/create');
    }

    public function store(Request $request){
        $this->validate($request,[
           'text' => 'required',
           'image' => 'image|max:2000'
        ]);

        $image = $request->file('image');

        $filenameWithExt = $image->getClientOriginalName();

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $image->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename .'_'.time().'.'.$extension;

        //Upload image
        $path = $image->storeAs('public/introductions',$filenameToStore);


        $introduction = new Introduction;
        $introduction->title = $request->input('title');
        $introduction->text = $request->input('text');
        $introduction->image = $filenameToStore;
        $introduction->save();

        return redirect('/admin/introductions')->with('success','Added Successfully');

    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $introduction = Introduction::find($id);
        return view('admin/introductions/edit')->with('introduction',$introduction);

    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'text' => 'required',
            'image' => 'image|max:2000'
           ]);
           
           $introduction = Introduction::find($id);

           if($request->hasFile('image')){
            $image = $request->file('image');
           

            //Get Filename with extension
            $filenameWithExt = $image->getClientOriginalName();
    
            //Get just the filename
    
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    
            //Get extension
            $extension = $image->getClientOriginalExtension();
    
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
    
            //Upload banner
            $path = $image->storeAs('public/introductions',$filenameToStore);
        
            if(Storage::delete('public/introductions/'.$introduction->image.'/')){
                File::delete($introduction->image);           
              }
   
             
              $introduction->image = $filenameToStore;
              $introduction->save();
        }
          
           
          
        $introduction->title = $request->input('title');
        $introduction->text = $request->input('text');
       
        $introduction->save();

   

          
           
           $introduction->save();

        

           return redirect('/admin/introductions')->with('success','Updated Successfully');
        

    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $introduction = Introduction::find($id);
        $introduction->delete();
        return redirect('/admin/introductions')->with('success','Deleted Succesfully');
    }

}
