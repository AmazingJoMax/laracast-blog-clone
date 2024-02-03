<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
        return view('posts.index',[
            'posts' => Post::latest()->filter(request(['search', 'category','author']))->paginate(5)->withQueryString() 
        ]);
    }

    public function show(Post $post){
        return view('posts.show',[
            'post' => $post,
            'categories' => Category::all(),
            'comments' => Comment::all()
        ]);
    }

    
}
