<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\NewsEvent;
use Image;
use Illuminate\Support\Facades\Log;

class NewsEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = NewsEvent::get()->toArray();
        return view('admin.newsevents.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsevents.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'event_date' => 'date|nullable|date_format:Y-m-d'
        ]);

        $status = 0;
        $msg = "";
        $event = new NewsEvent;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->slug = $this->create_slug_title($event->name);
        $event->status = 1;

        if ($request->hasFile('file')) {
            $imageName = $request->file->getClientOriginalName();
            $imageSize = $request->file->getClientSize();
            $imageType = $request->file->getClientOriginalExtension();
            $imageNameUniqid = md5($imageName . microtime()) . '.' . $imageType;
            $imageName = $imageNameUniqid;

            $event->image_name = $imageName;
            $event->image_type = $imageType;
            $event->image_size = $imageSize;
        }

        if ($event->save()) {
            // save image.
            if ($request->hasFile('file')) {

                $image_quality = 100;

                if (($event->image_size / 1000000) > 1) {
                    $image_quality = 75;
                }

                $cropped_data = json_decode($request->cropped_data, true);
                $path = 'public/news-events/';

                $image = Image::make($request->file);

                // crop image
                $image->crop(round($cropped_data['width']), round($cropped_data['height']), round($cropped_data['x']), round($cropped_data['y']));

                Storage::put($path . $event['id'] . '/' . $imageName, (string) $image->encode('jpg', $image_quality));

                // medium image
                $image->fit(600, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($path . $event['id'] . '/medium_' . $imageName, (string) $image->encode('jpg', $image_quality));

                // thumbnail image
                $image->fit(200, 100, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($path . $event['id'] . '/thumb_' . $imageName, (string) $image->encode('jpg', $image_quality));

                $status = 1;
            }
            $status = 1;
            $msg = "News created successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
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
        $event = NewsEvent::find($id);
        return view('admin.newsevents.edit', compact('event'));
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
        $request->validate([
            'name' => 'required',
            'event_date' => 'date|nullable|date_format:Y-m-d'
        ]);

        $status = 0;
        $msg = "";
        $event = NewsEvent::find($request->id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->slug = $this->create_slug_title($event->name);
        $event->status = 1;

        if ($request->hasFile('file')) {
            $imageName = $request->file->getClientOriginalName();
            $imageSize = $request->file->getClientSize();
            $imageType = $request->file->getClientOriginalExtension();
            $imageNameUniqid = md5($imageName . microtime()) . '.' . $imageType;
            $imageName = $imageNameUniqid;

            $event->image_name = $imageName;
            $event->image_type = $imageType;
            $event->image_size = $imageSize;
        }

        if ($event->save()) {
            // save image.
            if ($request->hasFile('file')) {

                $path = 'public/news-events/';
                Storage::deleteDirectory($path . $event->id);

                $image_quality = 100;

                if (($event->image_size / 1000000) > 1) {
                    $image_quality = 75;
                }

                $cropped_data = json_decode($request->cropped_data, true);
                $path = 'public/news-events/';

                $image = Image::make($request->file);

                // crop image
                $image->crop(round($cropped_data['width']), round($cropped_data['height']), round($cropped_data['x']), round($cropped_data['y']));

                Storage::put($path . $event['id'] . '/' . $imageName, (string) $image->encode('jpg', $image_quality));

                // medium image
                $image->fit(600, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($path . $event['id'] . '/medium_' . $imageName, (string) $image->encode('jpg', $image_quality));

                // thumbnail image
                $image->fit(200, 100, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($path . $event['id'] . '/thumb_' . $imageName, (string) $image->encode('jpg', $image_quality));

                $status = 1;
            } else {
                if (isset($event['image_name']) && isset($request->cropped_data) && !empty($request->cropped_data)) {
                    $cropped_data = json_decode($request->cropped_data, true);

                    $path = 'public/news-events/';
                    $image = Image::make(Storage::get('public/news-events/' . $event->id . '/' . $event->image_name));

                    Storage::deleteDirectory($path . $event->id);

                    // crop image
                    $image->crop(round($cropped_data['width']), round($cropped_data['height']), round($cropped_data['x']), round($cropped_data['y']));

                    $ext = pathinfo($event->image_name, PATHINFO_EXTENSION);

                    $imageNameUniqid = md5($event->image_name . microtime()) . '.' . $ext;

                    Storage::put($path . $event['id'] . '/' . $imageNameUniqid, (string) $image->encode('jpg', 100));

                    // medium image
                    $image->fit(600, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    Storage::put($path . $event['id'] . '/medium_' . $imageNameUniqid, (string) $image->encode('jpg', 100));

                    // thumbnail image
                    $image->fit(200, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    Storage::put($path . $event['id'] . '/thumb_' . $imageNameUniqid, (string) $image->encode('jpg', 100));

                    $event->image_name = $imageNameUniqid;
                    $event->save();
                }
            }

            $status = 1;
            $msg = "News updated successfully.";
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
        $path = 'public/news-events/';

        if (NewsEvent::find($id)->delete()) {
            Storage::deleteDirectory($path . $id);
            $status = 1;
            $http_status_code = 200;
            $msg = "News has been deleted";
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ], $http_status_code);
    }

    public function newsList()
    {
        $events = NewsEvent::all();
        return response()->json([
            'data' => $events
        ]);
    }
}
