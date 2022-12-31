<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\VideoGallery;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoGallery::get()->toArray();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 0;
        $msg = "";
        $gallery = new VideoGallery;
        $gallery->status = 1;
        $gallery->title = $request->title;
        $gallery->link = $request->link;
        $gallery->image_alt = $request->image_alt;

        if ($request->hasFile('file')) {
            $imageName = $request->file->getClientOriginalName();
            $imageSize = $request->file->getClientSize();
            $imageType = $request->file->getClientOriginalExtension();
            $imageNameUniqid = md5($imageName . microtime()) . '.' . $imageType;
            $imageName = $imageNameUniqid;

            $gallery->image_name = $imageName;
        }

        if ($gallery->save()) {
            // save image.
            if ($request->hasFile('file')) {

                $image_quality = 100;

                if (($gallery->image_size / 1000000) > 1) {
                    $image_quality = 75;
                }

                $cropped_data = json_decode($request->cropped_data, true);
                $path = 'public/video-galleries/';

                $image = Image::make($request->file);

                // crop image
                $image->crop(round($cropped_data['width']), round($cropped_data['height']), round($cropped_data['x']), round($cropped_data['y']));

                Storage::put($path . $gallery['id'] . '/' . $imageName, (string) $image->encode('jpg', $image_quality));

                // thumbnail image
                $image->fit(300, 100, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put($path . $gallery['id'] . '/thumb_' . $imageName, (string) $image->encode('jpg', $image_quality));
                $status = 1;
            }
            $status = 1;
            $msg = "VideoGallery created successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
    }

    public function galleryList()
    {
        $videos = VideoGallery::all();
        return response()->json([
            'data' => $videos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = VideoGallery::find($id);
        return view('admin.videos.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $status = 0;
        $msg = "";
        $gallery = VideoGallery::find($request->id);
        $gallery->image_alt = $request->image_alt;
        $gallery->title = $request->title;
        $gallery->link = $request->link;
        $gallery->status = 1;

        if ($request->hasFile('file')) {
            $imageName = $request->file->getClientOriginalName();
            $imageSize = $request->file->getClientSize();
            $imageType = $request->file->getClientOriginalExtension();
            $imageNameUniqid = md5($imageName . microtime()) . '.' . $imageType;
            $imageName = $imageNameUniqid;

            $gallery->image_name = $imageName;
        }

        if ($gallery->save()) {
            // save image.
            if ($request->hasFile('file')) {

                $path = 'public/video-galleries/';
                Storage::deleteDirectory($path . $gallery->id);

                $image_quality = 100;

                if (($gallery->image_size / 1000000) > 1) {
                    $image_quality = 75;
                }

                $cropped_data = json_decode($request->cropped_data, true);
                $path = 'public/video-galleries/';

                $image = Image::make($request->file);

                // crop image
                $image->crop(round($cropped_data['width']), round($cropped_data['height']), round($cropped_data['x']), round($cropped_data['y']));

                Storage::put($path . $gallery['id'] . '/' . $imageName, (string) $image->encode('jpg', $image_quality));

                // thumbnail image
                $image->fit(300, 100, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put($path . $gallery['id'] . '/thumb_' . $imageName, (string) $image->encode('jpg', $image_quality));
                $status = 1;
            } else {
                if (isset($request->cropped_data) && !empty($request->cropped_data)) {
                    $cropped_data = json_decode($request->cropped_data, true);

                    $path = 'public/video-galleries/';
                    $image = Image::make(Storage::get('public/video-galleries/' . $gallery->id . '/' . $gallery->image_name));

                    Storage::deleteDirectory($path . $gallery->id);

                    // crop image
                    $image->crop(round($cropped_data['width']), round($cropped_data['height']), round($cropped_data['x']), round($cropped_data['y']));

                    $ext = pathinfo($gallery->image_name, PATHINFO_EXTENSION);

                    $imageNameUniqid = md5($gallery->image_name . microtime()) . '.' . $ext;

                    Storage::put($path . $gallery['id'] . '/' . $imageNameUniqid, (string) $image->encode('jpg', 100));

                    // thumbnail image
                    $image->fit(300, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    Storage::put($path . $gallery['id'] . '/thumb_' . $imageNameUniqid, (string) $image->encode('jpg', 100));

                    $gallery->image_name = $imageNameUniqid;
                    $gallery->save();
                }
            }

            $status = 1;
            $msg = "VideoGallery updated successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 0;
        $http_status_code = 400;
        $msg = "";
        $path = 'public/video-galleries/';

        if (VideoGallery::find($id)->delete()) {
            Storage::deleteDirectory($path . $id);
            $status = 1;
            $http_status_code = 200;
            $msg = "VideoGallery has been deleted";
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ], $http_status_code);
    }
}
