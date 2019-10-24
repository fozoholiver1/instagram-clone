<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Redirector;
//use Intervention\Image\Facedes\Image;//image intervension library
class ProfilesController extends Controller
{


    public function index( User $user)
    {
        $postCount=Cache::remember('
        count.post.'.$user->id,
        now()->addSeconds(30),
        function () use($user) {

            $user->posts->count();//no of posts
        });

        $followersCount=Cache::remember('
        count.followers.'.$user->id,
        now()->addSeconds(30),
        function () use($user) {

            $user->profile->followers->count();
        });//with the cashe if the user refreshes before 30 sec no request is sent to the server

        $followingCount=Cache::remember('
        count.following.'.$user->id,
        now()->addSeconds(30),
        function () use($user) {

            $user->following->count() ;
        });


        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) :false; //we want get those following this user
        // dd($follows);
        //  $user=User::findOrFail($user);

        return view('profiles.index',compact('user','follows','postCount','followersCount','followingCount'));
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);//protecting unauthorized users from update action using the policy
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update',$user->profile);//protecting unauthorized users from update action using the policy


        $data= request()->validate([//validation
            'title'=>'required',
            'description'=>'required',
            'url'=>'required|url',
            'image'=>'',
        ]);


        if (request('image')) {
            $imagepath=request('image')->store('profile','public');//this will create an uploads link an directory in our public directory
            //$image=Image::make(public_path("storage/{$imagepath}"))->fit(1000,1000);//image intervension library
        //$image->save();
        } else {
         $imagepath=$user->Profile->image;
        }

       $myimage= ['image'=>$imagepath]; //asignning image to the image link

        auth()->user()->profile->update(array_merge(
            $data, $myimage,

        ));
//dd($user->id);
       // return redirect('/profiles/{$user->id}',compact('user'));
        return redirect( '/profiles/'. auth()->user()->id);
    }
}
