<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function index(){
        $popularPosts = Post::orderBy('views', 'desc')->take(5)->get();
        return view('pages.index')->with('popularPosts', $popularPosts);
    }
    public function about(){
        $title = " | About";
        return view('pages.about')->with('title', $title);
    }
    public function services(){
        $data = array(
            'title' => ' | Services',
            'services' => ['GM5 Module Repair', 'MS43 Tune/Remap', 'Module Programming']
        );
        return view('pages.services')->with($data);
    }
}
