<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('video-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['video'] = Video::latest()->paginate(8);
        return view('backend.admin.video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('video-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.video.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('video-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'url' => 'required',
        ]);

        if ($request->url) {
            $parsedUrl = '';
            if (!empty(parse_url($request->url)['host']))
                if (!empty(parse_url($request->url)['host']))
                    $parsedUrl = parse_url($request->url)['host'];
            //check if video is of youtube
            if ($parsedUrl !== 'www.youtube.com') {
                customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                return back()->withInput($request->all());
            }
        }

        //upload video url
        $video = new Video;
        $videoStatus = $video->firstOrCreate([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'url' => $request->url,
            'status' => $request->status,
            'show_in_homepage' => $request->show_in_homepage
        ]);

        CreateMessage('Video');

        return redirect('/admin/video');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('video-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['video'] = Video::find($id);
        return view('backend.admin.video.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('video-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['video'] = Video::find($id);
        return view('backend.admin.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $authorize = checkPermissionToAccess('video-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'url' => 'required',
        ]);

        $video = Video::find($id);

        //upload video
        if ($request->url) {
            $parsedUrl = '';

            if (!empty(parse_url($request->url)['host']))
                if (!empty(parse_url($request->url)['host']))
                    $parsedUrl = parse_url($request->url)['host'];
            //check if video is of youtube
            if ($parsedUrl === 'www.youtube.com') {
                $video->url = $request->url;
            } else {
                customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                return back()->withInput($request->all());
            }

        }

        $video->title_en = $request->title_en;
        $video->title_fr = $request->title_fr;
        $video->description_en = $request->description_en;
        $video->description_fr = $request->description_fr;
        $video->status = $request->status;
        $video->show_in_homepage = $request->show_in_homepage;

        $video->update();

        UpdateMessage('Video');
        return redirect('/admin/video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('video-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $video = Video::find($id);

        $video->delete();
        DeleteMessage('Video');
        return redirect('/admin/video');
    }
}
