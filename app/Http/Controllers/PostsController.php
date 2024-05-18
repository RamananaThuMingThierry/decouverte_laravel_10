<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use View;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::paginate(10);
        return View('posts.index', compact('posts'));
    }

    public function create(){
        $post = new Posts();
        $categories = Categories::select('id','titre')->get();
        return View('posts.form', compact('post', 'categories'));
    }

    public function store(PostRequest $request){
        $post = Posts::create($request->validated());
        $slug = $post->slug;
        $id = $post->id;
        return redirect()->route('post.show', compact('slug', 'id'))->with('success', 'L\'article a été bien sauvegarder');
    }

    public function show($slug, $id){
        $post_existe = Posts::where(['id' => $id, 'slug' => $slug])->exists();

        if($post_existe){
            $post = Posts::where(['id' => $id, 'slug' => $slug])->first();
            return View('posts.show', compact('post'));
        }else{
            return back()->with('warning', 'Ce post n\'existe pas dans la base de données!');
        }
    }

    public function edit($id){

        $post_existe = Posts::where(['id' => $id])->exists();
    
        if($post_existe){
            $post = Posts::where(['id' => $id])->first();
            $categories = Categories::select('id','titre')->get();
            return View('posts.form', compact('post', 'categories'));
        }else{
            return back()->with('warning', 'Ce post n\'existe pas dans la base de données!');
        }
    }

    public function update(PostRequest $request, $id){
        $post_existe = Posts::where(['id' => $id])->exists();
    
        if($post_existe){
            $post = Posts::where(['id' => $id])->first();
           $post->update($request->validated());
           $slug = $post->slug;
           $id = $post->id;
           return redirect()->route('post.show', compact('slug', 'id'))->with('success', 'L\'article a été bien sauvegarder');
        }else{
            return back()->with('warning', 'Ce post n\'existe pas dans la base de données!');
        }
    }
}
