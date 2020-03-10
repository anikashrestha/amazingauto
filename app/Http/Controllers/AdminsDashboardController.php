<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        // $pages = Page::all();
        // return view('/admin/dashboard');
        // ->with('pages',$pages);

        return view('/admin/dashboard');
    }

}
