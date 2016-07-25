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
        $this->middleware('auth');
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
        return view('home', compact('reminders', 'post', 'photographies'));
    }
}
