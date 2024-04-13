<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
      /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();
    return view('category', compact('categories'));
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
      'name_category' => 'required|max:255',
      'description_category' => 'required',
    ]);

    $category = new Category();
    $category->name_category = $request->name_category;
    $category->description_category = $request->description_category;
    $category->save();

    return redirect()->route('categories')
      ->with('success', 'Category created successfully.');
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
      'name_category' => 'required|max:255',
      'description_category' => 'required',
    ]);
    $category = Category::find($id);
    $category->update($request->all());
    return redirect()->route('categories')
      ->with('success', 'Category updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();
    return redirect()->route('categories')
      ->with('success', 'Category deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new category.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('category.createCategory');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $category = Category::find($id);
    return view('category.showCategory', compact('category'));
  }
  /**
   * Show the form for editing the specified category.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $category = Category::find($id);
    return view('category.editCategory', compact('category'));
  }
}
