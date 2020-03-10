<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbacksController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $clientfeedbacks = Feedback::latest()->paginate(10);
        return view('admin/feedbacks/index')->with('clientfeedbacks',$clientfeedbacks);
    }


    public function result(Request $request){
        $request->user()->authorizeRoles(['Admin', 'User']);
        $request->validate([
            'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $feedbacksearch = Feedback::where('full_name','LIKE','%' .$query. '%')->get();
        
        return view('admin/feedbacks/search')->with('feedbacksearch', $feedbacksearch);
   
    }

    public function edit(Request $request, $id){
        $request->user()->authorizeRoles(['Admin']);
        $clientfeedback = Feedback::find($id);
        return view('admin/feedbacks/edit')->with('feedback',$clientfeedback);

    }

    public function update(Request $request,$id){
       
  
         $feedback = Feedback::find($id);

         $feedback->status = $request->has('status');

    
         $feedback->save();
       
  
  
     return redirect('/admin/feedbacks/')->with('success','Update Successfully');
  
    }


    public function destroy(Request $request,$id){
        $request->user()->authorizeRoles(['Admin']);
        $feedback = ClientFeedBack::find($id);
        $feedback->delete();
        return redirect('/admin/feedbacks/')->with('success','Delete Successfully');
    }
    

}
