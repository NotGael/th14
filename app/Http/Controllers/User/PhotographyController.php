<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhotographyUserRequest;
use App\Http\Requests\EditPhotographyRequest;
use App\Photography;
use App\User;
use Input;
use Image;
use File;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photography = new Photography();
        return view('user.photography.create', compact('photography'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotographyUserRequest $request)
    {
        $online = ($request->get('online') == null) ? 0 : 1;
        //create new instance of model to save from form
        $photography = Photography::create([
            'online' => $online,
            'image_name' => Auth::user()->id,
            'image_extension' => $request->file('imageUser')->getClientOriginalExtension(),
            'user_id' => Auth::user()->id,
        ]);
        //define the admin.image paths
        $destinationFolder = '/imgs/users/';
        $destinationThumbnail = '/imgs/users/thumbnails/';
        //assign the image paths to new model, so we can save them to DB
        $photography->image_path = $destinationFolder;
        $photography->save();
        //parts of the image we will need
        $file = $request->file('imageUser');
        $imageName = $photography->image_name;
        $extension = $request->file('imageUser')->getClientOriginalExtension();
        //create instance of image from temp upload
        $image = Image::make($file->getRealPath());
        //save image with thumbnail
        $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
            ->resize(60, 60)
            ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);
        $user = User::findOrFail(Auth::user()->id);
        $user->photography_id = $photography->id;
        $user->save();
        return redirect()->route('user.index')->with('success', 'La photo a bien été sauvegardée');
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
        $photography = Photography::findOrFail($id);
        return view('user.photography.edit', compact('photography'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPhotographyRequest $request, $id)
    {
        $photography = Photography::findOrFail($id);
        $online = ($request->get('online') == null) ? 0 : 1;
        $photography->online = $online;
        if (!empty(Input::file('imageUser'))){
            //define the paths
            $destinationFolder = '/imgs/users/';
            $destinationThumbnail = '/imgs/users/thumbnails/';
            //parts of the image we will ne
            $file = Input::file('imageUser');
            $imageName = $photography->image_name;
            $extension = $request->file('imageUser')->getClientOriginalExtension();
            //create instance of image from temp upload
            $image = Image::make($file->getRealPath());
            //save image with thumbnail
            $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
                ->resize(60, 60)
                ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);
            $photography->image_extension = $extension;
        }
        $photography->save();
        return redirect()->route('user.index')->with('success', 'La photo a bien été sauvegardée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
