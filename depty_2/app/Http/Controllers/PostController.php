<?php
namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Support;
use App\Comment;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
    {	$categories = Category::all();    
    	$posts = Post::orderBy('created_at', 'desc')->get();

        return view('dashboard', ['posts' => $posts, 'categories'=>$categories]);
    }


    public function getDisplayPostInCategory($category_id){
    	$categories = Category::all();    
    	$posts = Post::where('category_id', $category_id)->orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts,'categoryid'=>$category_id ,'categories'=>$categories]);
    }

	public function postCreatePost(Request $request){
		
		$this->validate($request, [
				'content' => 'required|max:1000',
				'category_id' => 'required'
			]);

		$post = new Post();
		$post->content = $request['content'];
		$post->category_id = $request['category_id'];
		
		$message = "Something went wrong. Error occured.";
		if($request->user()->posts()->save($post)){
			$message = "Post successfully created!";
		}

		return redirect()->back()->with(['message' => $message]);
	}

	public function postSupportPost(Request $request){
		$post_id = $request['post_id'];
		$support = true;
		$post = Post::find($post_id);

		/*if(!$post){
			return null;
		}*/
		$user = Auth::user();
		$support = $user->supports()->where('post_id', $post_id)->first();
		$numsupportString="0 Support";
		if($support){
			$support->delete();
			
			$numsupport= $post->supports->count();
			if($numsupport>1){
				$numsupportString = $numsupport." Supports";
			}elseif($numsupport==1){
				$numsupportString = $numsupport." Support";
			}else{
				$numsupportString = "0 Support";
			}
			return response()->json(['num_support' => $numsupportString],200);
		}else{
			$support = new Support();
			$support->support = true;
			$support->user_id = $user->id;
			$support->post_id = $post->id;
			$support->save();
			$numsupport= $post->supports->count();
			if($numsupport>1){
				$numsupportString = $numsupport." Supports";
			}elseif($numsupport==1){
				$numsupportString = $numsupport." Support";
			}else{
				$numsupportString = "0 Support";
			}
			return response()->json(['num_support' => $numsupportString],200);

		}
	}

	public function postEditPost(Request $request){
		$this->validate($request,[
				'content' =>'required|max:1000'
			]);
		
			$post = Post::find($request['post_id']);
		if(Auth::user()->id!=$post->user_id){
			return redirect()->back();
		}else{
			$post->content= $request['content'];
			$post->update();
			return response()->json(['new_content' => $post->content],200);
		}
	}

	public function getDeletePost($post_id){
		$post = Post::where('id',$post_id)->first();
		if(Auth::user()->id!=$post->user_id){
			return redirect()->back();
		}else{
			$message = "Something went wrong. Error occured.";
				if($post->delete()){
					$message = "Post successfully deleted!";
				}
			return redirect()->back()->with(['message' => $message]);
		}
	}
}

