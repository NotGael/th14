<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function post(Request $request, $id)
    {
        dd("test");
        die();
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect(route('admin.articles.index', $id))->with('success', 'L\'article a bien été sauvegardé');
    }
}
