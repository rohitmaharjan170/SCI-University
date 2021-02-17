<?php

namespace App\Http\Controllers\backend;

use App\models\Admin;
use App\models\Banner;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BannerController extends Controller
{

    public function index()
    {
        $authorize = checkPermissionToAccess('banner-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Banner';
        $data['banners'] = Banner::latest()->paginate(20);

        return view('backend.admin.banner.index', $data);
    }

    public function create()
    {
        $authorize = checkPermissionToAccess('banner-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Banner';

        return view('backend.admin.banner.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|unique:banners,title_en',
            'title_fr' => 'required|unique:banners,title_fr',
            'video_url' => 'required_without:image',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|required_without:video_url'
        ]);

        try {
            $authorize = checkPermissionToAccess('banner-create');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();
            $banner = new Banner;
            //upload banner image or video
            if ($request->image) {
                //uploads the image by image file and folder name and returns image name
                $banner->image = uploadSingleImage($request->image, 'banner');
            } else {
                //parse the video url to get its host name
                $parsedUrl = '';
                if (!empty(parse_url($request->video_url)['host']))
                    if (!empty(parse_url($request->video_url)['host']))
                        $parsedUrl = parse_url($request->video_url)['host'];
                //check if it is a youtube video url
                if ($parsedUrl !== 'www.youtube.com') {
                    customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                    return back()->withInput($request->all());
                }

                $banner->video_url = $request->video_url;
            }

            $banner->title_en = $request->title_en;
            $banner->title_fr = $request->title_fr;
            $banner->description_en = $request->description_en;
            $banner->description_fr = $request->description_fr;
            $banner->status = $request->status;
            $banner->save();

            DB::commit();
            //Toast Message
            CreateMessage('Banner');
            return redirect('/admin/banner');
        } catch (\Exception $exception) {
            customErrorMessage($exception->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    public function edit($id)
    {
        $authorize = checkPermissionToAccess('banner-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['banner'] = Banner::find($id);

        return view('backend.admin.banner.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en' => 'required',
            'title_fr' => 'required',
        ]);

        try {
            $authorize = checkPermissionToAccess('banner-edit');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }
            DB::beginTransaction();

            $banner = Banner::find($id);
            //check if request has a image
            $folderName = 'banner';
            if ($request->image) {
                //remove the previously uploaded video url
                $banner->video_url = null;
                //check if old image exist if yes then delete it
                removeSingleOldImage($banner->image, $folderName);

                //upload new image
                $banner->image = uploadSingleImage($request->image, $folderName);
            }
            //check if request has a video url
            if ($request->video_url) {
                //check if previously banner has a image file then
                //remove file from local storage and database
                if ($banner->image) {
                    //check if old image exist if yes then delete it
                    removeSingleOldImage($banner->image, $folderName);
                }
                $banner->image = null;
            }
            $banner->video_url = $request->video_url;
            $banner->title_en = $request->title_en;
            $banner->title_fr = $request->title_fr;
            $banner->description_en = $request->description_en;
            $banner->description_fr = $request->description_fr;
            $banner->status = $request->status;
            $banner->update();

            DB::commit();

            //Toast Message
            UpdateMessage('Banner');

            return redirect('/admin/banner');
        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(),'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('banner-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $banner = Banner::find($id);
        $folderName = 'Banner';
        //check if old image exist if yes then delete it
        removeSingleOldImage($banner->image, $folderName);
        $banner->delete();

        //Toast Message
        DeleteMessage('Banner');

        return back();
    }
}
