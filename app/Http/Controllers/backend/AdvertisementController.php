<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Advertisement;
use DB;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    public function index()
    {
        $authorize = checkPermissionToAccess('banner-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['advertisement'] = Advertisement::latest()->paginate(8);
        return view('backend.admin.advertisement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('banner-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.advertisement.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('banner-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $request->validate([
            'title_en' => 'required|unique:advertisements,title_en',
            'title_fr' => 'required|unique:advertisements,title_fr|nullable',
            'url' => 'url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $partner = new Advertisement;

        //upload partner image
        if ($request->image) {
            $partner->logo = uploadSingleImage($request->image, 'advertisement');
        }

        $partner->title_en = $request->title_en;
        $partner->title_fr = $request->title_fr;
        $partner->description_en = $request->description_en;
        $partner->description_fr = $request->description_fr;
        $partner->url = $request->url;
        $partner->status = $request->status;
        $partner->save();

        CreateMessage('Advertisement');
        return redirect('/admin/advertisement');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('banner-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['advertisement'] = Advertisement::findOrFail($id);
        return view('backend.admin.advertisement.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('banner-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['advertisement'] = Advertisement::findOrFail($id);
        return view('backend.admin.advertisement.edit', $data);
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
        $authorize = checkPermissionToAccess('banner-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $partner = Advertisement::findOrFail($id);

        if ($request->image) {
            //remove old image
            removeSingleOldImage($partner->logo, 'advertisement');
            //upload new image
            $partner->logo = uploadSingleImage($request->image, 'advertisement');
        }
        $partner->title_en = $request->title_en;
        $partner->title_fr = $request->title_fr;
        $partner->description_en = $request->description_en;
        $partner->description_fr = $request->description_fr;
        $partner->url = $request->url;
        $partner->status = $request->status;
        $partner->update();

        UpdateMessage('Advertisement');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('banner-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $partner = Advertisement::find($id);
        //remove image from storage

        if ($partner->logo) {
            removeSingleOldImage($partner->logo, 'advertisement');
        }
        $partner->delete();
        return redirect('/admin/advertisement');
    }
}
