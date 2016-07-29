<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Reminder;
use App\Post;
use App\User;
use App\Photography;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::get();
        $post = Post::with('section')->with('user')->where('online', true)->orderBy('published_at', 'desc')->first();
        $photographies = Photography::all();
        return view('main.index', compact('reminders', 'post', 'photographies'));
    }

    public function reminders()
    {
        $reminders = Reminder::with('section')->with('user')->get();
        return view('main.reminders', compact('reminders'));
    }

    public function posts()
    {
        $posts = Post::get();
        return view('main.posts', compact('posts'));
    }

    public function photographies()
    {
        $photographies = Photography::with('section')->with('user')->get();
        return view('main.photographies', compact('photographies'));
    }
}
