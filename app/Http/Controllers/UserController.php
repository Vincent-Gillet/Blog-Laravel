<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
      /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return view('users', compact('users'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
//   public function store(Request $request)
//   {
//     dd($request->all());
//     $request->validate([
//       'name' => 'required|max:255',
//       'email' => 'required|email',
//       'role' => 'required',
//     ]);

//     $user = User::create($request->all());
//     $user->roles()->attach($request->role);

//     return redirect()->route('users')
//       ->with('success', 'User created successfully.');
//   }
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
        'name' => 'required|max:255',
        'email' => 'required|email',
        'role' => 'required',
    ]);
    $user = User::find($id);
    $user->update($request->all());

    return redirect()->route('users')
      ->with('success', 'User updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect()->route('users')
      ->with('success', 'User deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
//   public function create()
//   {
//     $user = User::all();
//     return view('user.createUser', compact('user'));
//   }
//   /**
//    * Display the specified resource.
//    *
//    * @param  int  $id
//    * @return \Illuminate\Http\Response
//    */
  public function show($id)
  {
    $user = User::findOrFail($id);

    return view('user.showUser', compact('user'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::find($id);

    return view('user.editUser', compact('user'), [
      'roles' => User::all(),
    ]);
  }
}
