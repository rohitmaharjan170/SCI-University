<?php

namespace App\Http\Controllers\backend;

use App\models\Press;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('press-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Press';
        $data['press'] = Press::latest()->paginate(8);
        return view('backend.admin.press.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('press-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Press';

        return view('backend.admin.press.create', $data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('press-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'press_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $press = new Press;

        //upload press image
        if ($request->press_image) {
            //uploads the image by image file and folder name and returns image name
            $image = uploadSingleImage($request->press_image, 'press');
        }

        $press->title_en = $request->title_en;
        $press->title_fr = $request->title_fr;
        $press->short_description_en = $request->short_description_en;
        $press->short_description_fr = $request->short_description_fr;
        $press->long_description_en = $request->long_description_en;
        $press->long_description_fr = $request->long_description_fr;
        $press->published_by = $request->published_by;
        $press->published_date = $request->published_date;
        $press->status = $request->status;
        $press->image = $image ?? '';
        $press->save();
        $press->update(['slug'=>str_slug($press->title_en,'-').'-'.$press->id]);

        //Toast Message
        CreateMessage('Press');

        return redirect('/admin/press');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $authorize = checkPermissionToAccess('press-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['press'] = Press::find($id);
        return view('backend.admin.press.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $authorize = checkPermissionToAccess('press-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['press'] = Press::find($id);
        return view('backend.admin.press.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $authorize = checkPermissionToAccess('press-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $press = Press::find($id);

        //upload new image
        if ($request->press_image) {
            $folderName = 'press';
            //check if old image exist if yes then delete it
            removeSingleOldImage($press->image, $folderName);
            //upload new image
            $press->image = uploadSingleImage($request->press_image, $folderName);
        }

        $press->title_en = $request->title_en;
        $press->title_fr = $request->title_fr;
        $press->short_description_en = $request->short_description_en;
        $press->short_description_fr = $request->short_description_fr;
        $press->long_description_en = $request->long_description_en;
        $press->long_description_fr = $request->long_description_fr;
        $press->published_by = $request->published_by;
        $press->published_date = $request->published_date;
        $press->status = $request->status;

        $press->update();

        //Toast Update
        UpdateMessage('Press');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $authorize = checkPermissionToAccess('press-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $press = Press::find($id);
        //remove image from storage
        $folderName = 'press';
        removeSingleOldImage($press->image, $folderName);
        $press->delete();

        return redirect('/admin/press');
    }

}
