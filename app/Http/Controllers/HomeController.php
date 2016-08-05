<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reminder;
use App\Post;
use App\User;
use App\Photography;
use App\Section;
use Carbon\Carbon;

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
        $posts = Post::whereDate('published_at', '<=', Carbon::now())->where('online', 1)->orderBy('published_at', 'desc')->take(2)->get();
        if(Auth::user())
        {
            if(Auth::user()->grade >= 1)
            {
                $photographies = Photography::where([['image_path', '/imgs/photographies/'], ['online', 1]])->paginate(40);
            }
        }
        return view('main.index', compact('reminders', 'posts', 'photographies'));
    }

    public function reminders()
    {
        $reminders = Reminder::with('section')->with('user')->get();
        return view('main.reminders', compact('reminders'));
    }

    public function posts()
    {
        $posts = Post::whereDate('published_at', '<=', Carbon::now())->where('online', 1)->orderBy('published_at', 'desc')->paginate(8);
        return view('main.posts', compact('posts'));

        // $post = Post::published()->where('id', $id)->firstOrFail();
    }

    public function photographies()
    {
        if(Auth::user())
        {
            if(Auth::user()->grade >= 1)
            {
                $photographies = Photography::where([['image_path', '/imgs/photographies/'], ['online', 1]])->with('user')->paginate(40);
            }
        }
        return view('main.photographies', compact('photographies'));
    }

    public function photography($id)
    {
        if(Auth::user())
        {
            if(Auth::user()->grade >= 1)
            {
                $photography = Photography::where([['image_path', '/imgs/photographies/'], ['online', 1], ['id', $id]])->with('user')->first();
            }
        }
        return view('main.photography', compact('photography'));
    }

    public function sections()
    {
        $sections = Section::with('photography')->with('user')->where('id', '<=', 5)->get();
        $users_section1 = User::where([['section_id', 1], ['grade', '<=', 2]])->get();
        $users_section2 = User::where([['section_id', 2], ['grade', '<=', 2]])->get();
        $users_section3 = User::where([['section_id', 3], ['grade', '<=', 2]])->get();
        $users_section4 = User::where([['section_id', 4], ['grade', '<=', 2]])->get();
        $users_section5 = User::where([['section_id', 5], ['grade', '<=', 2]])->get();
        return view('main.sections', compact('sections', 'users_section1', 'users_section2', 'users_section3', 'users_section4', 'users_section5'));
    }
}
