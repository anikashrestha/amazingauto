<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class AdminpagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $pages = Page::latest()->paginate(10);
        return view('admin/pages/index')->with('pages',$pages);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
     $pages = Page::all();
        return view('admin/pages/create')->with('pages',$pages);
    }

    public function store(Request $request){
        $this->validate($request,[
          'title' =>'required',
          'body' => 'required',
          'slug' =>'required',
          
        ]);

        $page = new Page;
        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->body = $request->input('body');
        $page->status = $request->has('status');
        $page->save();

        return redirect('admin/pages/')->with('success','Create Successfully');
    }


    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $page= Page::find($id);
        $pages = Page::all();
        
        return view('admin/pages/edit')->with('page',$page)->with('pages',$pages);

    }

    public function update(Request $request,$id){
       
       $this->validate($request,[
          'title' =>'required',
          'body' => 'required',
          'slug' =>'required',
          
        ]);
  
         $page = Page::find($id);

         $page->title = $request->input('title');
         $page->slug = $request->input('slug');
         $page->body = $request->input('body');
         $page->status = $request->has('status');

    
         $page->save();
       
  
  
     return redirect('/admin/pages/')->with('success','Update Successfully');
  
    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $page = Page::find($id);
        $page->delete();
        return redirect('/admin/pages')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        $request->user()->authorizeRoles(['Admin', 'User']);
        $request->validate([
          'query' => 'required|min:3'
        ]);
       
        $pages = Page::all();
        $query = $request->input('query');
        $pagesearch = Page::where('title','LIKE','%' .$query. '%')
        ->orWhere('slug','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/pages/search')->with('pagesearch', $pagesearch)->with('pages',$pages);
  
    }

}
