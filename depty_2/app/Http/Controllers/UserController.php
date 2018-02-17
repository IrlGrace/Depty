<?php
namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\UserInfo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function getAccount(){
        $categories = Category::all(); 
        $userinfo = UserInfo::where('user_id',Auth::user()->id)->first();
        
        return view('account',['categories'=>$categories, 'user'=>Auth::user(), 'userinfo' =>$userinfo]);
    }

     public function getUserProfile($user_id){
        $categories = Category::all(); 
       
        $posts = Post::where('user_id',$user_id)->orderBy('created_at', 'desc')->get();
        $userinfo = UserInfo::where('user_id',$user_id)->first();
        $userprofile = User::find($user_id);
      
        
        return view('profile',['categories'=>$categories, 'posts'=>$posts ,'userprofile'=>$userprofile,'user'=>Auth::user(), 'userinfo' =>$userinfo]);
    }
    

    public function postUpdateUserInfo(Request $request){
    	$user = Auth::user();
    	$this->validate($request,[
    			'firstname'=>'required|max:100',
    			'lastname'=>'required|max:100',
    			'birthdate'=>'required',
    			'expert'=>'required',
    			'location'=>'required',
    		]);
    	$userinfo2 = UserInfo::where('user_id',Auth::user()->id)->first();
    	if($userinfo2!=null){

    		$description="";
	    	if($request['description']=="null"){
	    		$description="...";
	    	}else{
	    		$description=$request['description'];
	    	}
	    	
			$userinfo2->firstname = $request['firstname'];
			$userinfo2->lastname = $request['lastname'];
			$userinfo2->birthdate = $request['birthdate'];
			$userinfo2->expert = $request['expert'];
			$userinfo2->location = $request['location'];
			$userinfo2->description = $description;

			$message = "Something went wrong. Error occured.";
			if($userinfo2->update()){
				$message = "User Information successfully updated!";
			}
    	}
    	else{	
	    	$description="";
	    	if($request['description']=="null"){
	    		$description="...";
	    	}else{
	    		$description=$request['description'];
	    	}
	    	$userinfo = new UserInfo();
			$userinfo->firstname = $request['firstname'];
			$userinfo->lastname = $request['lastname'];
			$userinfo->birthdate = $request['birthdate'];
			$userinfo->expert = $request['expert'];
			$userinfo->location = $request['location'];
			$userinfo->description = $description;

			

			$message = "Something went wrong. Error occured.";
			if($request->user()->userinfo()->save($userinfo)){
				$message = "User Information successfully updated!";
			}
		}	

		return redirect()->route('account.settings')->with(['message' => $message]);

    }

    public function postUpdateUserImage(Request $request){
    	$user = Auth::user();
    	$file = $request->file('displayphoto');
    	$filename = $user->codename.'_'.$user->id.'.jpg';

    	if($file){
    		
    		Storage::disk('local')->put($filename, File::get($file));
    		$user->picture=$user->codename.'_'.$user->id.'.jpg';
    		$user->update();
    	}

    	return redirect()->route('account.settings');
    }

    public function postUpdateCodename(Request $request){
    	$user = Auth::user();
    	$this->validate($request,[
    			'codename'=>'required|max:50'
    		]);
    	$user->codename=$request['codename'];
    	$message = "Something went wrong. Error occured.";
    	if($user->update()){
    		$message="Codename has been successfully updated.";
    	}

    	return redirect()->route('account.settings')->with(['message' => $message]);
    }

    public function postUpdatePassword(Request $request){
    	$user = Auth::user();
    	$this->validate($request,[
    			'old_password'=>'required',
    			'new_password'=>'required',
    			'confirm_password' => 'required'
    		]);
    	$message="Password has been Change.";
    	if(Auth::attempt(['password'=>$request['old_password']])){
    		if($request['new_password']==$request['confirm_password']){
    			$user->password=bcrypt($request['new_password']);
    			$user->update();
    		}else{
    			$message="Password Mismatch1";
    		}
    	}else{
    		$message="Password Mismatch2";
    	}

    	return redirect()->route('account.settings')->with(['message'=> $message]);
    }

    public function getUserImage($filename){
    	$file = Storage::disk('local')->get($filename);
    	return new Response($file, 200);
    }
}




