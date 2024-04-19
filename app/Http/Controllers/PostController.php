<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  // public function index()
  // {
  //   $posts = Post::all();
  //   $categories = Category::all();

  //   return view('dashboard', compact('posts', 'categories'));



  // }
  public function index(Request $request)
  {
      $categories = Category::all();
  
      if ($request->has('categories')) {
          $selectedCategories = $request->input('categories');
  
          $posts = Post::with('category')
              ->whereIn('id', $selectedCategories)
              ->orderBy('id', 'desc')
              ->get();
      } else {
          $posts = Post::with('category')->orderBy('id', 'desc')->get();
      }

      $posts = Auth::user()->postsUser()->get();
  
      return view('dashboard', compact('posts', 'categories'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
      'description' => 'required',
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->content = $request->content;
    $post->user_id = Auth::id();
    $post->save();


    $post->categories()->attach($request->categories) ;

    return redirect()->route('dashboard')
      ->with('success', 'Post created successfully.');
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
      'description' => 'required',
    ]);
    $post = Post::find($id);
    $post->update($request->all());

    // $post->categories()->attach($request->categories) ;

        // $post = $request->category_id; 
  
      // $categories->update($request->all());

    // $categories = Category::all();

    // $categories = $post->categories();

    // $categories->categories()->sync($request->category_id);

    $post->categories()->sync($request->categories);

    return redirect()->route('dashboard')
      ->with('success', 'Post updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('dashboard')
      ->with('success', 'Post deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('posts.create', [
    'categories' => $categories,
    ]);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::findOrFail($id);
    // Récupérer les catégories associées au post
    $categories = $post->categories()->get();

    return view('posts.show', compact('post', 'categories'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);
    $categories = Category::all();

    return view('posts.edit', compact('post'), [
      'categories' => $categories,
    ]);
  }
}
