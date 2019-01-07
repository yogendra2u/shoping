<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageModel;
use Image;


class ImageController extends Controller
{

	 public function __construct()
    {
        //$this->middleware('auth', ['except' => ['about_us']]);
        //$this->middleware('auth');
    }
   
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadfile()
    {

        $image = ImageModel::latest()->first();

        return view('uploadfile', compact('image'));
    }


    public function store(Request $request)
    {
        
       $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
         ]);

        $originalImage= $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 

        $imagemodel= new ImageModel();


        $imagemodel->filename=time().$originalImage->getClientOriginalName();
        $imagemodel->save();

        return back()->with('success', 'Your images has been successfully Upload');

    }

public function watermark(Request $request)
{


$img = Image::make('public/foo.jpg');

// paste another image
$img->insert('public/bar.png');

// create a new Image instance for inserting


$watermark = Image::make('public/watermark.png');
$img->insert($watermark, 'center');

// insert watermark at bottom-right corner with 10px offset
$img->insert('public/watermark.png', 'bottom-right', 10, 10);

}
}
?>