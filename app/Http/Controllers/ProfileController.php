<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image
;
class ProfileController extends Controller
{



       public function index($user)
    {
    	$user = User::findOrFail($user);
        return view('home', [
        	'user'=>$user,]);
    }
    public function edit($user){
    	$user = User::findOrFail($user);
        return view('edit', [
        	'user'=>$user,]);

    }
    public function update(User $user, Request $request){


    	$profile = $user->profile;

    	//$profile->description = $request->input('description');
    	//$profile->image = $request->input('image');
    	$data = request()->validate([
    		'description'=>'',
    		'image'=> '',
    	]);

    	if(request('image')){

    	$imagePath = request('image')->store('profile', 'public');
    	$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
    	$image->save();

    	}


    	$profile->update(array_merge($data, ['image'=>$imagePath]));

    	return redirect("/profile/{$user->id}");
    }
}



