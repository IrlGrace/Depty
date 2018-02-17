<?php
namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    	$categories = Category::all();
        return view('dashboard', ['category' => $category]);
    }
}

