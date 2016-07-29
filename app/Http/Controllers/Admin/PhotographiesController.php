<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreatePhotographyRequest;
use App\Http\Requests\EditPhotographyRequest;
use App\Photography;
use Input;
use Image;
use flash;
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
        if($request->get('online') == null)
        {
            $online = false;
        }
        else
        {
            $online = $request->get('online');
        }

        //create new instance of model to save from form
        $photography = Photography::create([
            'online' => $online,
            'image_name' => $request->get('image_name'),
            'image_extension' => $request->file('image')->getClientOriginalExtension(),
            'image_type' => 1,
            'user_id' => Auth::user()->id,
        ]);
        //define the admin.image paths
        $destinationFolder = '/imgs/photographies/';
        $destinationThumbnail = '/imgs/photographies/thumbnails/';

        //assign the image paths to new model, so we can save them to DB
        $photography->image_path = $destinationFolder;

        // format checkbox values and save model
        $this->formatCheckboxValue($photography);
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

        // Process the uploaded image, add $model->attribute and folder name

        return redirect()->route('admin.photos.index', [$photography]);

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

            $destinationFolder = '/imgs/photographies/';
            $destinationThumbnail = '/imgs/photographies/thumbnails/';

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
        return redirect()->route('admin.photos.index', compact('photography'));
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

    public function formatCheckboxValue($myImage)
    {
        $myImage->online = ($myImage->online == null) ? 0 : 1;
    }
}
