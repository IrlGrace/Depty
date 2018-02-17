<?php
namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function postMakeComment(Request $request)
    {	
    	$this->validate($request, [
				'message' => 'required|max:1000',
				'post_id' => 'required'
			]);

		$comment = new Comment();
		$comment->message = $request['message'];
		$comment->post_id = $request['post_id'];
		$message = "Something went wrong. Error occured.";
		if($request->user()->comments()->save($comment)){
			$message = "Comment successfully created!";
		}

		return redirect()->back()->with(['message' => $message]);
    }
    public function getDisplayCommentInPost($post_id){ 
    	$comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get();
    
    }
}

