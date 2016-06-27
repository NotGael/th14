<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePhotographyRequest;
use App\Http\Requests\EditPhotographyRequest;
use Input;
use Image;
use App\Photography;
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
        $photographies = Photography::all();
        return view('photographies.index', compact('photographies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photographies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotographyRequest $request)
    {
        //create new instance of model to save from form

        $photography = new Photography([
            'image_name' => $request->get('image_name'),
            'image_extension' => $request->file('image')->getClientOriginalExtension(),
            'mobile_image_name' => $request->get('mobile_image_name'),
            'mobile_extension' => $request->file('mobile_image')->getClientOriginalExtension(),
            'is_active' => $request->get('is_active'),
            'is_featured' => $request->get('is_featured')

        ]);

        //define the image paths

        $destinationFolder = '/imgs/photographies/';
        $destinationThumbnail = '/imgs/photographies/thumbnails/';
        $destinationMobile = '/imgs/photographies/mobile/';

        //assign the image paths to new model, so we can save them to DB

        $photography->image_path = $destinationFolder;
        $photography->mobile_image_path = $destinationMobile;

        // format checkbox values and save model

        $this->formatCheckboxValue($photography);
        $photography->save();

        //parts of the image we will need

        //$file = Input::file('image');
        $file = $request->file('image');


        $imageName = $photography->image_name;
        $extension = $request->file('image')->getClientOriginalExtension();

        //create instance of image from temp upload

        $image = Image::make($file->getRealPath());

        //save image with thumbnail

        $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
            ->resize(60, 60)
            // ->greyscale()
            ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

        // now for mobile

        //$mobileFile = Input::file('mobile_image');
        $mobileFile = $request->file('mobile_image');

        $mobileImageName = $photography->mobile_image_name;
        $mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

        //create instance of image from temp upload
        $mobileImage = Image::make($mobileFile->getRealPath());
        $mobileImage->save(public_path() . $destinationMobile . $mobileImageName . '.' . $mobileExtension);


        // Process the uploaded image, add $model->attribute and folder name

        //flash()->success('Image Created!');

        return redirect()->route('photographies.show', [$photography]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photography = photography::findOrFail($id);
        return view('photographies.show', compact('photography'));
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
        return view('photographies.edit', compact('photography'));
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

      $photography->is_active = $request->get('is_active');
      $photography->is_featured = $request->get('is_featured');

      $this->formatCheckboxValue($photography);

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
              // ->greyscale()
              ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);
          $photography->image_extension = $extension;

        }

        if (!empty(Input::file('mobile_image'))) {

            $destinationMobile = '/imgs/photographies/mobile/';
            $mobileFile = Input::file('mobile_image');

            $mobileImageName = $photography->mobile_image_name;
            $mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

            //create instance of image from temp upload
            $mobileImage = Image::make($mobileFile->getRealPath());
            $mobileImage->save(public_path() . $destinationMobile . $mobileImageName . '.' . $mobileExtension);
            $photography->mobile_extension = $mobileExtension;

        }

        $photography->save();

        //flash()->success('image edited!');
        return redirect()->route('photographies.show', compact('photography'));
        //return view('photographies.edit', compact('Photography'));
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

        File::delete(public_path($photography->mobile_image_path).
            $photography->mobile_image_name . '.' .
            $photography->mobile_extension);
        File::delete(public_path($thumbPath). 'thumb-' .
            $photography->image_name . '.' .
            $photography->image_extension);

        Photography::destroy($id);

        //flash()->success('image deleted!');

        return redirect()->route('photographies.index');

    }

    public function formatCheckboxValue($myImage)
    {

        $myImage->is_active = ($myImage->is_active == null) ? 0 : 1;
        $myImage->is_featured = ($myImage->is_featured == null) ? 0 : 1;
    }
}
