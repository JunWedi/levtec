<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
 use App\Http\Requests\PostRequest; // useする

 class PostController extends Controller
 {
     
  public function index(Post $post)
   {
     return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
   } 
  
  public function show(Post $post)
   {
     return view('posts.show')->with(['post' => $post]);
   }
  
  public function create()
   {
     return view('posts.create');
   }
   
  
  public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
     {
         $input = $request['post'];
         $post->fill($input)->save();
         return redirect('/posts/' . $post->id);
     }
     
    public function edit(Post $post)
    {
      return view('posts.edit')->with(['post' => $post]);
    }
  
public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
}

public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}

 
}
?>

