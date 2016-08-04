<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSectionRequest;
Use App\Http\Requests\EditSectionRequest;
use App\Photography;
use App\Section;
use App\User;
use Input;
use Image;
use File;

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
        return view('admin.sections.index', compact('sections', 'users_section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = new Section();
        $users = User::lists('totem', 'id');
        return view('admin.sections.create', compact('section', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSectionRequest $request)
    {
        if(!empty(Input::file('imageSection')) && Auth::user()){
            $name = $request->get('name');
            $photography = Photography::create([
                'online' => 1,
                'image_name' => $name,
                'image_extension' => $request->file('imageSection')->getClientOriginalExtension(),
                'user_id' => Auth::user()->id,
            ]);
            //define the paths
            $destinationFolder = '/imgs/sections/';
            $destinationThumbnail = '/imgs/sections/thumbnails/';
            //assign the image paths to new model, so we can save them to DB
            $photography->image_path = $destinationFolder;
            $photography->save();
            //parts of the image we will need
            $file = $request->file('imageSection');
            //create instance of image from temp upload
            $image = Image::make($file->getRealPath());
            //save image with thumbnail
            $image->save(public_path() . $destinationFolder . $photography->image_name . '.' . $photography->image_extension)
                ->resize(60, 60)
                ->save(public_path() . $destinationThumbnail . 'thumb-' . $photography->image_name . '.' . $photography->image_extension);
            $photography = Photography::where('image_name', $name)->first();
            $section = Section::create([
                'user_id' => $request->get('user_id'),
                'name' => $request->get('name'),
                'content' => $request->get('content'),
                'photography_id' => $photography->id,
            ]);
        }
        else
        {
            $section = Section::create([
                'user_id' => $request->get('user_id'),
                'name' => $request->get('name'),
                'content' => $request->get('content'),
            ]);
        }
        return redirect(route('admin.sections.index'))->with('success', 'La section a bien été sauvegardée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $users = User::lists('totem', 'id');
        $users_section = User::where('section_id', $id)->get();
        return view('admin.sections.edit', compact('section', 'users', 'users_section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSectionRequest $request, $id)
    {
        $photography = null;
        $section = Section::findOrFail($id);
        $section->update($request->all());
        if($section->photography)
        {
            $photography = Photography::findOrFail($section->photography_id);
        }
        if(!empty(Input::file('imageSection')))
        {
            if($section->photography)
            {
                // Delete old file
                File::delete($section->photography->image_path.$section->name.'.'.$section->photography->image_extension);
                File::delete($section->photography->image_path.'thumb'.$photography->image_name.'.'.$section->photography->image_extension);
            }
            else
            {
                if(Auth::user())
                {
                    $photography = Photography::create([
                        'online' => 1,
                        'image_name' => $section->name,
                        'image_extension' => $request->file('imageSection')->getClientOriginalExtension(),
                        'user_id' => Auth::user()->id,
                    ]);
                    $section->photography_id = $photography->id;
                    $section->save();
                }
            }
            //define the paths
            $destinationFolder = '/imgs/sections/';
            $destinationThumbnail = '/imgs/sections/thumbnails/';
            //assign the image paths to new model, so we can save them to DB
            $photography->image_path = $destinationFolder;
            $photography->save();
            //parts of the image we will need
            $file = Input::file('imageSection');
            //create instance of image from temp upload
            $image = Image::make($file->getRealPath());
            //save image with thumbnail
            $image->save(public_path() . $destinationFolder . $photography->image_name . '.' . $photography->image_extension)
                ->resize(60, 60)
                ->save(public_path() . $destinationThumbnail . 'thumb-' . $photography->image_name . '.' . $photography->image_extension);
        }
        return redirect(route('admin.sections.index'))->with('success', 'La section a bien été sauvegardée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        if($section->photography)
        {
            File::delete($section->photography->image_path.$section->photography->image_name.'.'.$section->photography->image_extension);
            File::delete($section->photography->image_path.'thumb'.$section->photography->image_name.'.'.$section->photography->image_extension);
        }
        Section::destroy($id);
        return redirect()->route('admin.sections.index');
    }
}
