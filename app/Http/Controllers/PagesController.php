<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Page;
use App\Aboutus;
use App\Menu;
use App\Logo;
use App\Banner;
use App\Map;
use App\Footer;
use App\Quicklinks;
use App\Sociallink;
use App\Usefullinks;
use App\Contactoffice;
use App\Feedback;
use App\Spare;
use App\Brand;
use App\Brandii;
use App\GAlleryindex;
use App\Album;
use App\Photo;



class PagesController extends Controller
{
    public function home(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $banner = Banner::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $brandii = Brandii::where('status',1)->get();
        $galleryindex = Galleryindex::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        

        return view('index')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('banners',$banner)
        ->with('brands',$brands)        
        ->with('brandii',$brandii) 
        ->with('galleryindex',$galleryindex)  
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }

    public function index(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $banner = Banner::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $brandii = Brandii::where('status',1)->get();
        $galleryindex = Galleryindex::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }

        return view('index')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('banners',$banner)
        ->with('brands',$brands)
        ->with('brandii',$brandii)  
        ->with('galleryindex',$galleryindex)   
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }

    public function about(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $about = Aboutus::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }        
           return view('about')->with('categories',$allCatogories)->with('logos',$logos)->with('abouts',$about)
           ->with('footers',$footers)
           ->with('quickLinks',$quickLinks)
           ->with('socialLinks',$socialLinks)
           ->with('usefulLinks',$usefulLinks)
           ->with('contacts',$contacts)
           ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }
    
    public function body(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $about = Aboutus::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        return view('body')->with('categories',$allCatogories)
        ->with('logos',$logos)->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
 
    }

    public function brand(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $about = Aboutus::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        return view('brand')->with('categories',$allCatogories)
        ->with('brands',$brands)
        ->with('logos',$logos)->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }
    
    public function car(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $about = Aboutus::where('status',1)->get();
        
        $brandii = Brandii::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        $galleryindex = Galleryindex::latest()->where('status',1)->paginate(4);
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        return view('car')->with('categories',$allCatogories)
        ->with('brands',$brands)
        ->with('brandii',$brandii)  
        ->with('logos',$logos)->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('galleryindex',$galleryindex)   
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }
    

    public function brandindex(){

        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $banner = Banner::where('status',1)->get();
        $brandii = Brandii::where('status',1)->get();
        $maps = Map::all();
        $footers = Footer::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        

        return view('brandindex')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('banners',$banner)
        ->with('brandii',$brandii)        
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    
    }

    public function cardetail(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $footers = Footer::all();
        $galleryindex = Galleryindex::where('status',1)->get();
    $contacts = Contactoffice::all();
    $quickLinks = Quicklinks::all();
    $usefulLinks = Usefullinks::all();
    $socialLinks = Sociallink::all();
    $contactDetails = Contactoffice::orderBy('id','ASC')->get();
    $maps = Map::all();
    
    $albums = Album::with('Photos')->get();

        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }

        return view('cardetail')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('footers',$footers)
        
    ->with('albums',$albums)
        ->with('galleryindex',$galleryindex)   
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }

    // Contact Page
   public function contact(){
    $logos = Logo::where('status',1)->get();
    $map = Map::all();
    $footers = Footer::all();
    $contacts = Contactoffice::all();
    $quickLinks = Quicklinks::all();
    $usefulLinks = Usefullinks::all();
    $socialLinks = Sociallink::all();
    $contactDetails = Contactoffice::orderBy('id','ASC')->get();
    $menus = new Menu;
    $maps = Map::all();
    try{
        $allCatogories = $menus->tree();

    }catch(Exception $e){
        // no parent category found
    }
       return view('contact')
       ->with('logos',$logos)
       ->with('categories',$allCatogories)
       ->with('footers',$footers)
       ->with('quickLinks',$quickLinks)
       ->with('socialLinks',$socialLinks)
       ->with('usefulLinks',$usefulLinks)
       ->with('contacts',$contacts)
       ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
   }


    public function hints(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }

        return view('hints')->with('categories',$allCatogories)
        ->with('logos',$logos);
    }

    public function spare(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $spares = Spare::all();
        $footers = Footer::all();
        $maps = Map::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        return view('spare')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('spares', $spares)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }

    public function feedback(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $footers = Footer::all();
        $maps = Map::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }
        return view('feedback')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps) ;
    }


    public function new(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        $footers = Footer::all();
        $maps = Map::all();
        $contacts = Contactoffice::all();
        $quickLinks = Quicklinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contactDetails = Contactoffice::orderBy('id','ASC')->get();
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }

        return view('new')->with('categories',$allCatogories)
        ->with('logos',$logos)
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts)
        ->with('contactDetails',$contactDetails)->with('maps',$maps);
    }
    public function send(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }

        return view('send')->with('categories',$allCatogories)
        ->with('logos',$logos);
    }

    public function galleryslider(){
        $menus = new Menu;
        $logos = Logo::where('status',1)->get();
        try{
            $allCatogories = $menus->tree();

        }catch(Exception $e){
            // no parent category found
        }

        return view('galleryslider')->with('categories',$allCatogories)
        ->with('logos',$logos);
    }







   
    public function getPage($slug = null)
	{
        $logos = Logo::where('status',1)->get();
        $menus = new Menu;
        $footers = Footer::all();
        $quickLinks = QuickLinks::all();
        $usefulLinks = Usefullinks::all();
        $socialLinks = Sociallink::all();
        $contacts = ContactOffice::orderBy('id','ASC')->get();

    try{
        $allCatogories = $menus->tree();

    }catch(Exception $e){
        // no parent category found
    }
        $page = Page::where('slug', $slug)->where('status',1);
        $page = $page->firstOrFail();
       
        return view('dynamic')
        ->with('logos',$logos)
        ->with('page', $page)->with('categories',$allCatogories)
        ->with('footers',$footers)
        ->with('quickLinks',$quickLinks)
        ->with('socialLinks',$socialLinks)
        ->with('usefulLinks',$usefulLinks)
        ->with('contacts',$contacts) ;
	}

}
