<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests;
Use App\Http\Requests\EditSectionRequest;
use App\Photography;
use App\Section;
use App\User;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::get();
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = new Section();
        $users = User::lists('lastname', 'firstname', 'totem', 'id');
        $photographies = Photography::lists('id', 'image_name', 'image_path', 'image_extension');
        return view('admin.sections.create', compact('section', 'photographies', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photography = Photography::create([
            'online' => $request->get('online'),
            'image_name' => $request->get('image_name'),
            'image_extension' => $request->file('image')->getClientOriginalExtension(),
        ]);
        $section = Section::create([
            'user_id' => $request->get('user_id'),
            'photography_id' => $photography->id,
            'name' => $request->get('name'),
            'content' => $request->get('content'),
        ]);
        return redirect(route('admin.sections.index', $section));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::where('id', $id)->firstOrFail();
        return $section;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        $users = User::lists('lastname', 'firstname', 'totem', 'id');
        $users_section = User::lists('lastname', 'firstname')->where('section_id', $id)->all();

        return view('admin.sections.edit', compact('section', 'users', 'users_section'));
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
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return redirect(route('admin.sections.edit', $id))->with('success', 'Le reminder a bien été sauvegardé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::destroy($id);
        return redirect()->route('admin.sections.index');
    }
}
