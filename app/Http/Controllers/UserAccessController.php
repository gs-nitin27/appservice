<?php

//use App\Models\User;
namespace App\Http\Controllers;
use App\Models\UserAccessService;
use App\Models\OtpVarifyService;
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
        
    }

     public function register(Request $request)
    {  
       $new_score = new UserAccessService();
       $new_score->name=$request->input('name');
       $new_score->email=$request->input('email');
       $new_score->dob=$request->input('dob');
       $new_score->contact_no=$request->input('phone');
       $new_score->gender=$request->input('gender');
       if($new_score->save())
       {
         $resp = array('status' =>'1' ,'data'=>$new_score,'message'=>'user registered' );    
       }
       else
       {
        $resp = array('status' =>'0' ,'data'=>$new_score,'message'=>'user not registered' );    
       }
       return response()->json($resp);
    }
    //
    public function sent_otp(Request $request,$id)
    {
      $otpObj = new OtpVarifyService();
      $otp_code = mt_rand(1000,10000);
      $res = $otpObj->sendWay2SMS(9528454915,8824784642, $id, $otp_code);
      if($res != '0')
      {  $new_score = new UserAccessService(); 
         $userdata = $new_score->get_userdata($id);
        if ($userdata != '0')
        {
         $resp = array('status' =>'2' ,'data'=>$userdata,'message'=>'user registered','otp'=>$res );    
        }
        else
        {
         $resp = array('status' =>'1' ,'data'=>$userdata,'message'=>'user not registered','otp'=>$res ); 
        }
      }
      else
      {
       $resp = array('status' =>'0' ,'message'=>'Failure','data'=>[]);
      }
     return response()->json($resp,200);
    }

    public function getUserData(Request $request,$id)
    {
     $new_score = new UserAccessService();
     $resp = $new_score->get_userdata($id);
     if($resp != '0')
     {
       $resp = array('status' =>'1' ,'message'=>'Success','data'=>$resp);
     }else
     {
       $resp = array('status' =>'0' ,'message'=>'Failure','data'=>[]);
     }
     return response()->json($resp,200);
    }

    public function view_detail()
    {
      return response()->json(User::all());
    }

    //
}
