<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class OtpVarifyService extends Model
{
public function sendWay2SMS($uid, $pwd, $phone, $otp)
{
$varUserName='t1ntnagarwalsms';
$varPWD='44824769';
$varSenderID='GSPROF';  
$varPhNo=$phone;
$varMSG= $otp." + is + OTP + code + for + login ";//"message to send";
$url="http://nimbusit.co.in/api/swsendSingle.asp";
$data="username=".$varUserName."&password=".$varPWD."&sender=".$varSenderID."&sendto=".$varPhNo."&message=".$varMSG;
$result =  $this->postData($url,$data); 

if($result)
{
return $otp;
}
else
{
return '0';
}
}

public function postdata($url,$data)
{
 
$objURL = curl_init($url);
curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($objURL,CURLOPT_POST,1);
curl_setopt($objURL, CURLOPT_POSTFIELDS,$data);



$retval = curl_exec($objURL); 
curl_close($objURL);

 //print_r($retval);

return $retval;

}


}