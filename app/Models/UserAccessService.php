<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class UserAccessService extends Model
{
protected $table = 'user';
protected $guarded = ['userid'];

public function get_userdata($id)
{
 
 // $phone = $user->posts()->where('contact_no', $id)->get();
return $this->hasOne('App\Models\UserAccessService');

}

}



?>