<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\BoardOfDirector;
use App\models\BoardOfDirectorImage;
use Illuminate\Http\Request;
use DB;

class BoardDirController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('bod-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Board Of Director';
        $data['bod'] = BoardOfDirector::latest()->paginate(8);
        return view('backend.admin.bod.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('bod-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.bod.create');
    }

    public function store(Request $request)
    {

        $authorize = checkPermissionToAccess('bod-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            DB::beginTransaction();

            $bod = new BoardOfDirector;

            //upload bod image
            if ($request->image) {
                $bod->image = uploadSingleImage($request->image, 'bod');
            }

            $bod->name = $request->name;
            $bod->designation = $request->designation;
            $bod->short_description_en = $request->short_description_en;
            $bod->short_description_fr = $request->short_description_fr;
            $bod->status = $request->status;
            $bod->faculty = $request->faculty;
            $bod->save();

            DB::commit();

            //Toast Message
            CreateMessage('Board Of Director');

            return redirect('/admin/bod');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Board Of Director!', 'Error');
            DB::rollback();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('bod-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['bod'] = BoardOfDirector::find($id);
        return view('backend.admin.bod.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('bod-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['bod'] = BoardOfDirector::find($id);
        return view('backend.admin.bod.edit', $data);
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
        $authorize = checkPermissionToAccess('bod-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            DB::beginTransaction();

            $bod = BoardOfDirector::find($id);

            if ($request->image) {
                $folderName = 'bod';
                //remove the previously uploaded image from storage
                //check if old image exist if yes then delete it
                removeSingleOldImage($bod->image, $folderName);
                //upload new image
                $bod->image = uploadSingleImage($request->image, $folderName);
            }
            $bod->name = $request->name;
            $bod->designation = $request->designation;
            $bod->short_description_en = $request->short_description_en;
            $bod->short_description_fr = $request->short_description_fr;
            $bod->status = $request->status;
            $bod->faculty = $request->faculty;
            $bod->update();

            DB::commit();
            //Toast Message
            UpdateMessage('Board Of Director');
            return redirect('/admin/bod');
        } catch (\Exception $e) {
            FailedMessage('Board Of Director');
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('bod-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $bod = BoardOfDirector::find($id);
        //remove image from storage
        $folderName = 'bod';
        //check if old image exist if yes then delete it
        removeSingleOldImage($bod->image, $folderName);
        $bod->delete();

        DeleteMessage('Board Of Director');
        return redirect('/admin/bod');
    }
}
