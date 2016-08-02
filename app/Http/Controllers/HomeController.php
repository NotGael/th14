<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Reminder;
use App\Post;
use App\User;
use App\Photography;
use App\Section;

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

    public function sections()
    {
        $sections = Section::with('photography')->with('user')->get();
        $users_section1 = User::where('section_id', 1)->get();
        $users_section2 = User::where('section_id', 2)->get();
        $users_section3 = User::where('section_id', 3)->get();
        $users_section4 = User::where('section_id', 4)->get();
        $users_section5 = User::where('section_id', 5)->get();
        return view('main.sections', compact('sections', 'users_section1', 'users_section2', 'users_section3', 'users_section4', 'users_section5'));
    }
}
