<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
//use Intervention\Image\Facedes\Image;//image intervension library
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $users=auth()->user()->following()->pluck('profiles.user_id');//we want to get user following the said profile frome the user_ids
        $posts=Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);//latest method is to order in descending order
        // dd($posts);
        return view('post.index',compact('posts'));
    }

    public function create(){

        return view('post.create');
    }

    public function store(){

        $data= request()->validate([//validation
            'caption'=>'required',
            'image'=>['image','required'],
        ]);

        $imagepath=request('image')->store('uploads','public'); //this will create an uploads link an directory in our
        //public directory

        //image intervension library

        //.................................................................................
        //$image=Image::make(public_path("storage/{$imagepath}"))->fit(1200,1200);//image intervension library
        //$image->save();
        //............................................................................................

        //auth()->user()->posts()->create($data); // we are saving data through the user-post relationship

      auth()->user()->posts()->create([ //saving  the uploads link and caption to db
            'caption'=>$data['caption'],
            'image'=>$imagepath,
        ]);

        //Post::create($data);
       //dd( request()->all());

       return redirect( '/profiles/'. auth()->user()->id);
    }

    public function show(Post $post){

        return view('post.show',compact('post'));
    }
}
