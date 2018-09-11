<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class UserAccessService extends Model
{
protected $table = 'user';
protected $guarded = ['userid'];

public function get_userdata($id)
{
// echo $id;die;
$data =  UserAccessService::where('contact_no', $id)->get();
if (sizeof($data) != 0) {
	return $data;
}else
{
	return 0;
}

}

}



?>