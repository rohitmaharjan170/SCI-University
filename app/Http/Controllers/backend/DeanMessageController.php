<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\DeanMessage;
use Illuminate\Http\Request;

class DeanMessageController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('gallery-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Dean Message';
        $data['deanMessage'] = DeanMessage::latest()->paginate(8);
        return view('backend.admin.dean-message.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('gallery-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Dean Message';

        return view('backend.admin.dean-message.create', $data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('gallery-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $deanMessage = new DeanMessage;

        //upload gallery image
        if ($request->image) {
            //uploads the image by image file and folder name and returns image name
            $image = uploadSingleImage($request->image, 'deanmessage');
        }

        $deanMessage->name = $request->name;
        $deanMessage->post = $request->post;
        $deanMessage->description_en = $request->description_en;
        $deanMessage->description_fr = $request->description_fr;
        $deanMessage->status = $request->status;
        $deanMessage->image = $image ?? '';
        $deanMessage->save();

        //Toast Message
        CreateMessage('Dean Message');

        return redirect('/admin/dean-message');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('gallery-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['deanMessage'] = DeanMessage::find($id);
        return view('backend.admin.dean-message.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('gallery-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['deanMessage'] = DeanMessage::find($id);
        return view('backend.admin.dean-message.edit', $data);
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
        $authorize = checkPermissionToAccess('gallery-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $deanMessage = DeanMessage::find($id);

        //upload new image
        if ($request->image) {
            $folderName = 'deanmessage';
            //check if old image exist if yes then delete it
            removeSingleOldImage($deanMessage->image, $folderName);
            //upload new image
            $deanMessage->image = uploadSingleImage($request->image, $folderName);
        }

        $deanMessage->name = $request->name;
        $deanMessage->post = $request->post;
        $deanMessage->description_en = $request->description_en;
        $deanMessage->description_fr = $request->description_fr;
        $deanMessage->status = $request->status;
        $deanMessage->save();

        //Toast Update
        UpdateMessage('Dean Message');

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
        $authorize = checkPermissionToAccess('gallery-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $deanMessage = DeanMessage::find($id);
        //remove image from storage
        $folderName = 'deanmessage';
        removeSingleOldImage($deanMessage->image, $folderName);
        $deanMessage->delete();

        DeleteMessage('Dean Message');

        return redirect('/admin/dean-message');
    }
}
