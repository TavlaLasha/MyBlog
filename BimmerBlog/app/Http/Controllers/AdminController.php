<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $data = array(
            'usersCount' => \App\Models\User::count(),
            'postsCount' => \App\Models\Post::count(),
            'viewsCount' => \App\Models\Post::sum('views')
        );
        
        return view('admin.index')->with($data);
    }
    public function posts(Request $request){
        if($request -> has('search')) {
            $data = $request->input('search');
            $posts = Post::where('title', 'LIKE', '%'. $data . '%')->paginate(7);
        }else{
            $posts = Post::paginate(7);
        }
        return view('admin.posts')->with('posts', $posts);
    }
    public function users(Request $request){
        if($request -> has('search')) {
            $data = $request->input('search');
            $users = User::where('name', 'LIKE', '%'. $data . '%')->paginate(7);
        }else{
            $users = User::paginate(7);
        }
        return view('admin.users')->with('users', $users);
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users')->with('success', 'User Deleted From Database');
    }
    public function postSearch(Request $request)
    {
        $data = $request->input('data');
        $posts = Post::where('title', 'LIKE', '%'. $data . '%')->paginate(7);

        return view('admin.posts')->with('posts', $posts);
    }
    public function userSearch(Request $request)
    {
        $data = $request->input('data');
        $users = User::where('name', 'LIKE', '%'. $data . '%')->paginate(7);

        return view('admin.users')->with('users', $users);
    }
}
