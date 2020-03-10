<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;

class SubMenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function create($menu_id){
    $menu = Menu::find($menu_id);
    return view('admin/submenus/create')->with('menu', $menu);

}


public function store(Request $request){
   
    
    $this->validate($request,[
        'sub_menu_name' => 'required',
        'description' =>'required',
        'link' => 'required'


    ]);

    $submenu = new SubMenu;
    $submenu->menu_id = $request->input('menu_id');
    $submenu->sub_menu_name = $request->input('sub_menu_name');
    $submenu->description = $request->input('description');
    $submenu->link= $request->input('link');
    $submenu->save();

    return redirect('/admin/submenus/')->with('success','Menu Created');
}
}

