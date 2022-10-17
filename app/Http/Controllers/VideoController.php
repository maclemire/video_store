<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show',]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retreive all videos from models Video
        // $videos = video::where('is_published', 0)->orderBy('updated_at', 'desc')->limit(4)->get();
        $videos = Video::orderBy('updated_at', 'DESC')->paginate(10);
        // Send data to View
        return view("pages.home", compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        // dd($request->all());
        // dd($request->file('url_img'));
        $request->validate([
            'title' => 'required|min:3|string|max:20|unique:videos,title',
            'description' => 'required|min:15|string|max:1000',
            'url_img' => 'required|image|mimes:png,jpg,jpeg|max:2000',
            'nationality' => 'required|min:3|string|max:20',
            'year_created' => 'required|min:3|max:20',
        ]);

        $validateImg = $request->file('url_img')->store('videos');

        $new_video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url_img' => $validateImg,
            'nationality' => $request->nationality,
            'year_created' => $request->year_created,
        ]);

        if ($request->has('images')) {
            // 2-stock all images selected in array
            $imagesSelected = $request->file('images');
            // 3- loop storage each image
            foreach ($imagesSelected as $image) {
                // give a new name for each image
                $image_name = md5(rand(1000, 10000)) . '.' . strtolower($image->extension());
                // set the pathname
                $path_upload = 'images/';
                $image->move(public_path($path_upload), $image_name);

                Images::create([
                    "slug" => $path_upload . $image_name, // posts/images/shhjhjshshshsjh.png
                    "created_at" => now(),
                    "video_id" => $new_video->id
                ]);
            }
        }


        return redirect()
            ->route('home')
            ->with('status', 'Le film a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view("pages.show", compact('video'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('pages.edit', compact('video'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        if ($request->hasFile('url_img')) {
            // delete previous image
            Storage::delete($video->url_img);
            // store the new image
            $video->url_img = $request->file('url_img')->store('videos');
        }

        // 1-Verify if User select image or not
        if ($request->has('images')) {
            // 2-stock all images selected in array
            $imagesSelected = $request->file('images');
            // 3- loop storage each image
            foreach ($imagesSelected as $image) {
                // give a new name for each image
                $image_name = md5(rand(1000, 10000)) . '.' . strtolower($image->extension());
                // set the pathname
                $path_upload = 'images/';
                $image->move(public_path($path_upload), $image_name);

                Images::create([
                    "slug" => $path_upload . $image_name, // posts/images/shhjhjshshshsjh.png
                    "created_at" => now(),
                    "video_id" => $video->id
                ]);
            }
        }

        $request->validate([
            'title' => 'required|min:3|string|max:20',
            'description' => 'required|min:15|string|max:1000',
            'url_img' => 'required|sometimes|image|mimes:png,jpg,jpeg|max:2000',
            'nationality' => 'required|min:3|string|max:20',
            'year_created' => 'required|min:3|max:20',
        ]);

        $validateImg = $request->file('url_img')->store('videos');

        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'url_img' => $validateImg,
            'nationality' => $request->nationality,
            'year_created' => $request->year_created,
        ]);


        return redirect()
            ->route('videos.show', $video->id)
            ->with('status', 'Le film a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()
        ->route('home')
        ->with('status', "Le film a bien été supprimé");
    }
}
