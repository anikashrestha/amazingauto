<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
// use App\Page;


class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $roles = Role::all();
        // $pages = Page::all();
        return view('admin/roles/index')->with('roles',$roles);
        // ->with('pages',$pages);

    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $pages = Page::all();
        return view('admin/roles/create')->with('pages',$pages);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'description' => 'required'
        ]);

        $role = new Role;
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        return redirect('/admin/roles')->with('success','Created Successfully');
    }

    public function edit(Request $request, $id){
        $request->user()->authorizeRoles(['Admin']);
        $pages = Page::all();
        $role = Role::find($id);
        return view('admin/roles/edit')->with('role',$role)->with('pages',$pages);
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'name'=>'required',
            'description' => 'required'
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();
        return redirect('/admin/roles')->with('success','Updated Successfully');
    }


    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $role = Role::find($id); 
        $role->delete();

        return redirect('/admin/roles')->with('success','Deleted Successfully');
    }

}
