<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);

            if($validator->fails())
            {
                return redirect()->back()->with('message', 'Comment area is mandatory');
            }

            $post = Post::where('slug', $request->post_slug)->first();
            if($post)
            {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Comment Success');
            }
            else
            {
               return redirect()->back()->with('message', 'Knowledge tidak ditemukan');
            }
        }
        else
        {
           return redirect('login')->with('message', 'Login terlebih dahulu');
        }
    }

    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $comment = Comment::where('id', $request->comment_id)->where('user_id', Auth::user()->id)->first();

            if($comment)
            {
                $comment -> delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Comment Deletion Success'
                ]);
            }
            else
            {
                return response()->json([
                   'status' => 500,
                   'message' => 'Comment not found'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Login to delete this comment'
            ]);
        }
    }
}
