<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
// use Session;
use Auth;
use File;
// use App\Page;
use App\Role;


class UsersController extends Controller
{
    private function errorValidate($request){
        return $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);
    }

    private function errorUpdateValidate($request){
        return $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'about'=>'required'
        ]);
    }


    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Admin', 'User']);
        $pages =  Page::all();
        return view('admin.users.index')->with('users',User::all())->with('pages',$pages);
    }
    
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Admin']);
        $role = Role::all();
        return view('/admin/users/create')->with('user', Auth::user())->with('roles',$role);
    }
    
    public function store(Request $request)
    {
        $this->errorValidate($request);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password')
        ]);

        $profile=Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/users/avatar.png',
            'about'=>'This is about me'
            ]);
            
        $role = $request->input('role_id');

        $user->roles()->attach($role);
        $user->save();
    
        return redirect('/admin/users/list')->with('success','User profile created successfully.');
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Admin']);
        $user = User::find($id);
        $role = Role::all();
        return view('admin/users/edit')->with('user',$user)->with('roles',$role);
    }

    public function updateStore(Request $request, $id){
        
        $this->errorUpdateValidate($request);
        
        $user = User::find($id);

        if($request->hasFile('avatar')){
            $avatar=$request->avatar;
            $avatar_new_name=time().$avatar->getClientOriginalName();
            $avatar->move('uploads/users/',$avatar_new_name);
            if(!($user->profile->avatar=='uploads/users/avatar.png')){
                File::delete($user->profile->avatar);
            }
            $user->profile->avatar='uploads/users/'.$avatar_new_name;
            $user->profile->save();
        }

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->roles()->sync([$request->input('role_id')]);
        $user->save();
        

     
        $user->profile->about=$request->input('about');
     
       
        $user->profile->save();
        $user->save();

        
        return redirect('admin/users/list')->with('success','User updated successfully.');

    }
    
    public function update(Request $request)
    {
        $this->errorUpdateValidate($request);
        
        $user=Auth::user();

        if($request->hasFile('avatar')){
            $avatar=$request->avatar;
            $avatar_new_name=time().$avatar->getClientOriginalName();
            $avatar->move('uploads/users/',$avatar_new_name);
            if(!($user->profile->avatar=='uploads/users/avatar.png')){
                File::delete($user->profile->avatar);
            }
            $user->profile->avatar='uploads/users/'.$avatar_new_name;
            $user->profile->save();
        }

      
        $user->name=$request->name;
        $user->email=$request->email;
        $password = bcrypt($request->password);
        $user     = User::where('email', $request->email)->first();
        if ($user) {
    
            $user->password = $password;
            $user->save();
         }

       

      

      
        $user->profile->about=$request->about;
        $user->save();
        $user->profile->save();

        return redirect('admin/users/list')->with('success','Your profile updated successfully.');

    }
    
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Admin']);
        $user = User::find($id);
        $user->delete();
        return redirect('admin/users/list')->with('success','Deleted Succesfully');
    }

    public function profile(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        return view('admin.users.profile')->with('user', Auth::user());
    }

    public function result(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $request->validate([
            'query' => 'required|min:3'
          ]);

     $query = $request->input('query');
        $usersearch = User::where('name','LIKE',"% .$query. %")
        ->orWhere('email','LIKE','%' .$query. '%')->get();
        return view('admin/users/search')->with('usersearch', $usersearch);
    }


}
