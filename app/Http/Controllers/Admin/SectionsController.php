<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateSectionRequest;
Use App\Http\Requests\EditSectionRequest;
use App\Section;
use App\User;
use App\Photography;
use Input;
use Image;
use flash;
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
        if($request->get('online') == null)
        {
            $online = false;
        }
        else
        {
            $online = $request->get('online');
        }
        if(!empty(Input::file('imageSection'))){
            $name = $request->get('name');
            $photography = Photography::create([
                'online' => $online,
                'image_name' => $name,
                'image_extension' => $request->file('imageSection')->getClientOriginalExtension(),
                'image_type' => 2,
                'user_id' => Auth::user()->id,
            ]);
            //define the admin.image paths
            $destinationFolder = '/imgs/sections/';
            $destinationThumbnail = '/imgs/sections/thumbnails/';

            //assign the image paths to new model, so we can save them to DB
            $photography->image_path = $destinationFolder;

            // format checkbox values and save model
            $this->formatCheckboxValue($photography);
            $photography->save();

            //parts of the image we will need
            $file = $request->file('imageSection');

            $imageName = $photography->image_name;
            $extension = $request->file('imageSection')->getClientOriginalExtension();

            //create instance of image from temp upload
            $image = Image::make($file->getRealPath());

            //save image with thumbnail
            $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
                ->resize(60, 60)
                ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

            // Process the uploaded image, add $model->attribute and folder name

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
        $section = Section::firstOrFail($id);
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
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return redirect(route('admin.sections.index', $id))->with('success', 'La section a bien été sauvegardé');
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

    public function formatCheckboxValue($myImage)
    {
        $myImage->online = ($myImage->online == null) ? 0 : 1;
    }
}
