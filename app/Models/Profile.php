<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];

   public function ProfileImage(){

   	$imagePath = ($this->image) ? $this->image:'profile/oTNhVKol3IlpAP4dfaOdxiUrHuVpqF3z3MD8FWJh.png';

   return '/storage/'.$imagePath;

   }

	public function user(){

    return $this->belongsTo(User::class);
    
	}
}
