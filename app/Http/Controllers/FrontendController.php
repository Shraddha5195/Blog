<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'esc')->paginate(5);
        $posts->toJson();
        return view('frontend.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::all();
        return view('frontend.post', compact('post', 'comments'));
    }
    public function addcmnt(Request $request, $id)
    {
        if (Auth::user()) {
            $this->validate($request, [            
                'comment'=>'required'
        ]);
        }
        else{
            $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'comment'=>'required'
        ]);
        }
        
        $comment = new Comment;
        if (Auth::user()) {
            $comment->user_id = Auth::user()->id;
            $comment->name = Auth::user()->name;
            $comment->email = Auth::user()->email;


        } else {
            $comment->name = $request->input('name');
            $comment->email = $request->input('email');
        }
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->id;
        $comment->save();

        return redirect('post/'.$id);
    }

    public function addcategories()
    {
        return view('frontend.categories');
    }

}
