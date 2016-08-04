<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhotographyRequest;
use App\Http\Requests\EditPhotographyRequest;
use App\Photography;
use Input;
use Image;
use File;

class PhotographiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photographies = Photography::get();
        return view('admin.photographies.index', compact('photographies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photography = new Photography();
        return view('admin.photographies.create', compact('photography'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotographyRequest $request)
    {
        $online = ($request->get('online') == null) ? 0 : 1;
        $photography = Photography::create([
            'online' => $online,
            'image_name' => $request->get('image_name'),
            'image_extension' => $request->file('image')->getClientOriginalExtension(),
            'user_id' => Auth::user()->id,
        ]);
        //define the paths
        $destinationFolder = '/imgs/photographies/';
        $destinationThumbnail = '/imgs/photographies/thumbnails/';
        //assign the image paths to new model, so we can save them to DB
        $photography->image_path = $destinationFolder;
        $photography->save();
        //parts of the image we will need
        $file = $request->file('image');
        $imageName = $photography->image_name;
        $extension = $request->file('image')->getClientOriginalExtension();
        //create instance of image from temp upload
        $image = Image::make($file->getRealPath());
        //save image with thumbnail
        $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
            ->resize(60, 60)
            ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);
        return redirect()->route('admin.photos.index')->with('success', 'La photo a bien été sauvegardée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photography = Photography::findOrFail($id);
        return view('admin.photographies.show', compact('photography'));
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
        return view('admin.photographies.edit', compact('photography'));
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
        $photography->online = $request->get('online');
        if (!empty(Input::file('image'))){
            //define the paths
            $destinationFolder = '/imgs/photographies/';
            $destinationThumbnail = '/imgs/photographies/thumbnails/';
            //parts of the image we will need
            $file = Input::file('image');
            $imageName = $photography->image_name;
            $extension = $request->file('image')->getClientOriginalExtension();
            //create instance of image from temp upload
            $image = Image::make($file->getRealPath());
            //save image with thumbnail
            $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
                ->resize(60, 60)
                ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);
            $photography->image_extension = $extension;
        }
        $photography->save();
        return redirect()->route('admin.photos.index')->with('success', 'La photo a bien été sauvegardée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photography = Photography::findOrFail($id);
        $thumbPath = $photography->image_path.'thumbnails/';
        File::delete(public_path($photography->image_path).
            $photography->image_name . '.' .
            $photography->image_extension);
        File::delete(public_path($thumbPath). 'thumb-' .
            $photography->image_name . '.' .
            $photography->image_extension);
        Photography::destroy($id);
        return redirect()->route('admin.photos.index');
    }
}
