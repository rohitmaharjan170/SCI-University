<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('notice-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Notice';
        $data['notice'] = Notice::latest()->paginate(8);
        return view('backend.admin.notice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('notice-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Notice';

        return view('backend.admin.notice.create', $data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('notice-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $notice = new Notice;

        //upload notice image
        if ($request->image) {
            //uploads the image by image file and folder name and returns image name
            $image = uploadSingleImage($request->image, 'notice');
        }

        $notice->title_en = $request->title_en;
        $notice->title_fr = $request->title_fr;
        $notice->description_en = $request->description_en;
        $notice->description_fr = $request->description_fr;
        $notice->status = $request->status;
        $notice->image = $image ?? '';
        $notice->save();

        //Toast Message
        CreateMessage('Notice');

        return redirect('/admin/notice');
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
        $authorize = checkPermissionToAccess('notice-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['notice'] = Notice::find($id);
        return view('backend.admin.notice.view', $data);
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
        $authorize = checkPermissionToAccess('notice-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['notice'] = Notice::find($id);
        return view('backend.admin.notice.edit', $data);
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
        $authorize = checkPermissionToAccess('notice-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $notice = Notice::find($id);

        //upload new image
        if ($request->image) {
            $folderName = 'notice';
            //check if old image exist if yes then delete it
            removeSingleOldImage($notice->image, $folderName);
            //upload new image
            $notice->image = uploadSingleImage($request->image, $folderName);
        }

        $notice->title_en = $request->title_en;
        $notice->title_fr = $request->title_fr;
        $notice->description_en = $request->description_en;
        $notice->description_fr = $request->description_fr;
        $notice->status = $request->status;
        $notice->save();

        //Toast Update
        UpdateMessage('Notice');

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
        $authorize = checkPermissionToAccess('notice-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $notice = Notice::find($id);
        //remove image from storage
        $folderName = 'notice';
        removeSingleOldImage($notice->image, $folderName);
        $notice->delete();

        return redirect('/admin/notice');
    }
}
