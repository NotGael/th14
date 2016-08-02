<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreatePhotographyRequest;
use App\Http\Requests\EditPhotographyRequest;
use App\Photography;
use App\User;
use Input;
use Image;
use flash;
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
    public function store(Request $request)
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
            'image_name' => Auth::user()->id,
            'image_extension' => $request->file('imageUser')->getClientOriginalExtension(),
            'image_type' => 3,
            'user_id' => Auth::user()->id,
        ]);

        //define the admin.image paths
        $destinationFolder = '/imgs/users/';
        $destinationThumbnail = '/imgs/users/thumbnails/';

        //assign the image paths to new model, so we can save them to DB
        $photography->image_path = $destinationFolder;

        // format checkbox values and save model
        $this->formatCheckboxValue($photography);
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

        // Process the uploaded image, add $model->attribute and folder name

        $user = User::findOrFail(Auth::user()->id);
        $user->photography_id = $photography->id;
        $user->save();

        return redirect()->route('user.index', $photography);
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
    public function update(Request $request, $id)
    {
        $photography = Photography::findOrFail($id);

        $photography->online = $request->get('online');

        if (!empty(Input::file('imageUser'))){

            $destinationFolder = '/imgs/users/';
            $destinationThumbnail = '/imgs/users/thumbnails/';

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
        return redirect()->route('user.index', $photography);
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

    public function formatCheckboxValue($myImage)
    {
        $myImage->online = ($myImage->online == null) ? 0 : 1;
    }
}
