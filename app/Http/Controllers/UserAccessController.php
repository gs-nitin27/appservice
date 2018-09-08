<?php


namespace App\Http\Controllers;
use App\Models\UserAccessService;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     public function register(Request $request)
    {  
       $new_score = new User();
       $new_score->name=$request->input('name');
       $new_score->email=$request->input('email');
       $new_score->dob=$request->input('dob');
       $new_score->contact_no=$request->input('phone');
       $new_score->gender=$request->input('gender');
       if($new_score->save())
       {
        return response()->json($new_score);
       }else
       {
        return response()->json("error");
       }
    }
    //

    public function view_detail()
    {
      return response()->json(User::all());
    }

    //
}
