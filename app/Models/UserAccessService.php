<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class UserAccessService extends Model
{
protected $table = 'user';
protected $guarded = ['userid'];
}

?>