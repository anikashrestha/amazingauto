<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use App\Quicklinks;
use App\Usefullinks;
use App\Sociallink;
use App\Contactoffice;

class FootersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin','User']);
        $footers = Footer::all();
        $quickLinks = QuickLinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contacts = ContactOffice::all();
        return view('admin/footers/index')->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('socialLinks',$socialLinks)
        ->with('contacts',$contacts);

    }

    public function create(Request $request){
      $request->user()->authorizeRoles(['Admin']);
      return view('admin/footers/create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'copyright' =>'required',
        ]);
        $footer = new Footer();
        $footer->copyright = $request->copyright;
        $footer->save();

        foreach($request->input('quick_links_name') as $key => $value){
            $this->validate($request,[
                'quick_links_name' => 'required',
                'quick_links' => 'required',

            ]);

            QuickLinks::create([
                'quick_links_name' => $value,
                'quick_links' => $request->quick_links[$key],
                'footer_id' => $footer->id
            ]);
        }

        foreach($request->input('useful_links_name') as $key => $value){
            $this->validate($request,[
                'useful_links_name' => 'required',
                'useful_links' => 'required',

            ]);

            Usefullinks::create([
                'useful_links_name' => $value,
                'useful_links' => $request->useful_links[$key],
                'footer_id' => $footer->id
            ]);
        }
        foreach($request->input('social_links') as $key => $value){
            $this->validate($request,[
                'social_icon' => 'required',
                'social_links' => 'required',

            ]);

            Sociallink::create([
                'social_links' => $value,
                'social_icon' => $request->social_icon[$key],
               
                'footer_id' => $footer->id
            ]);
        }
        foreach($request->input('contact_info') as $key => $value){
            $this->validate($request,[
                'contact_info' => 'required',
                 'icon' => 'required'
            ]);

            ContactOffice::create([
                'contact_info' => $value,
                'icon' => $request->icon[$key] ,
                'footer_id' => $footer->id
            ]);
        }
        return redirect('/admin/footers')->with('success','Added Successfully');



    }

    public function edit(Request $request, $id){
        $request->user()->authorizeRoles(['Admin']);
        $footer = Footer::find($id);
        $quickLinks = Quicklinks::where('footer_id',$id)->get();
        $usefulLinks = Usefullinks::where('footer_id',$id)->get();
        $socialLinks = Sociallink::where('footer_id',$id)->get();
        $contacts = Contactoffice::where('footer_id',$id)->get();
        
        return view('admin/footers/edit')->with('footer',$footer)
        ->with('quickLinks',$quickLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('socialLinks',$socialLinks)
        ->with('contacts',$contacts);
    }




    public function update(Request $request,$id){
        $this->validate($request,[
            'copyright' =>'required',

        ]);

        $footer = Footer::find($id);
        $footer->copyright = $request->copyright;
        $footer->save();
        Quicklinks::where('footer_id',$footer->id)->delete();
        foreach($request->input('quick_links_name') as $key => $value){
            $this->validate($request,[
                'quick_links_name' => 'required',
                'quick_links' => 'required',

            ]);
            Quicklinks::create([
                'quick_links_name' => $value,
                'quick_links' => $request->quick_links[$key],
                'footer_id' => $footer->id
            ]);
        }
        Usefullinks::where('footer_id',$footer->id)->delete();
        foreach($request->input('useful_links_name') as $key => $value){
            $this->validate($request,[
                'useful_links_name' => 'required',
                'useful_links' => 'required',

            ]);

            Usefullinks::create([
                'useful_links_name' => $value,
                'useful_links' => $request->useful_links[$key],
                'footer_id' => $footer->id
            ]);
        }
        Sociallink::where('footer_id',$footer->id)->delete();
        foreach($request->input('social_links') as $key => $value){
            $this->validate($request,[
                'social_icon' => 'required',
                'social_links' => 'required',

            ]);
            Sociallink::create([
                'social_links' => $value,
                'social_icon' => $request->social_icon[$key],               
                'footer_id' => $footer->id
            ]);
        }
        ContactOffice::where('footer_id',$footer->id)->delete();
        foreach($request->input('contact_info') as $key => $value){
            $this->validate($request,[
                'contact_info' => 'required',
                'icon' => 'required'
    
            ]);

            ContactOffice::create([
                'contact_info' => $value,
                'icon' => $request->icon[$key],
                'footer_id' => $footer->id
            ]);
        }
            
       
      
  
   return redirect('/admin/footers/')->with('success','Updated Successfully');
  
    }
    
    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $footer = Footer::find($id);
        $footer->delete();
        return redirect('/admin/footers/')->with('success','Deleted Succesfully');
    }

}
