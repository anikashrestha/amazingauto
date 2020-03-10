<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aboutus;

class AboutsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $abouts = Aboutus::latest()->paginate(10);
        $request->user()->authorizeRoles(['Admin', 'User']);
        return view('admin/about/index')->with('abouts',$abouts);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('admin/about/create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'heading'=> 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $about = new Aboutus;
        $about->heading = $request->input('heading');
       $about->title = $request->input('title');
       $about->description = $request->input('description');
       $about->status = $request->has('status');
       $about->save();
       return redirect('/admin/about')->with('success','Added Successfully');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $about = Aboutus::find($id);
        return view('admin/about/edit')->with('about',$about);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'heading'=> 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

       $about = Aboutus::find($id);
       $about->heading = $request->input('heading');
       $about->title = $request->input('title');
       $about->description = $request->input('description');
       $about->status = $request->has('status');
       $about->save();
       return redirect('/admin/about')->with('success','Updated Successfully');
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $about = Aboutus::find($id);
        $about->delete();

        return redirect('/admin/about')->with('success','Deleted Successfully');
    }

}
