<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $menus = Menu::latest()->paginate(10);       
        $request->user()->authorizeRoles(['Admin', 'User']);
        return view('admin/menus/index')->with('menus',$menus);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $menus = Menu::with('children')->where('parent_id','=','0')->get();
        return view('admin/menus/create')->with('menus',$menus);
    }

    public function store(Request $request){
        $this->validate($request,[
         'title' => 'required',
        //  'link' => 'required'
        ]);

        $menu = new Menu;
        $menu->title = $request->input('title');
        $menu->display_order = $request->input('display_order');
        $menu->link = $request->input('link');
        $menu->parent_id = $request->input('parent_id');

        $menu->save();
        return redirect('admin/menus/')->with('success','Create Successfully');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $menus = Menu::with('children')->where('parent_id','=','0')->get();
        $menu = Menu::find($id);
        return view('admin/menus/edit')->with('menu',$menu)->with('menus',$menus);
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'title' => 'required',
           //  'link' => 'required'
           ]);
        $menu = Menu::find($id);
        $menu->title = $request->input('title');
        $menu->display_order = $request->input('display_order');
        $menu->link = $request->input('link');
        $menu->parent_id = $request->input('parent_id');

        $menu->save();
        return redirect('admin/menus/')->with('success','Update Successfully');

    }

    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('admin/menus')->with('success','Delete Successfully');
    }

    public function result(Request $request)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $request->validate([
          'query' => 'required|min:3'
        ]);
       
       $pages = Page::all();
        $query = $request->input('query');
        $menusearch = Menu::where('title','LIKE','%' .$query. '%')->get();
        
    
        return view('admin/menus/search')->with('menusearch', $menusearch);
  
    }

}
