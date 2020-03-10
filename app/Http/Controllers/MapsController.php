<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;

class MapsController extends Controller
{
    
    public function __construct(){
        return $this->middleware('auth');
    }


    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $maps = Map::all();
        return view('admin/map/index')->with('maps',$maps);
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        return view('admin/map/create');
    }

    public function edit(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $map = Map::find($id);
        return view('admin/map/edit')->with('map',$map);
    }

    public function store(Request $request){
        $this->validate($request,[
            'lat' => 'required',
            'lon' => 'required',
            'address' => 'required' 
        ]);

        Map::create([
            'lat' => $request->lat,
            'lon' => $request->lon,
            'address' => $request->address
        ]);
        return redirect('/admin/map/')->with('success','Added Successfully');
    }


    public function update(Request $request,$id){
        $this->validate($request,[
            'lat' => 'required',
            'lon' => 'required',
            'address' => 'required' 
        ]);

        $map = Map::find($id);
        $map->lat = $request->lat;
        $map->lon = $request->lon;
        $map->address = $request->address;
        $map->save();
        return redirect('/admin/map/')->with('success','Updated Successfully');
    }


    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $map = Map::find($id);
        $map->delete();
        return redirect('/admin/map/')->with('success','Deleted Successfully');

    }


}
