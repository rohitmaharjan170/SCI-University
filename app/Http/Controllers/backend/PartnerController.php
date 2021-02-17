<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\BoardOfDirector;
use App\models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('partner-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['partner'] = Partner::latest()->paginate(8);
        return view('backend.admin.partner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('partner-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.partner.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('partner-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $partner = new Partner;

        //upload partner image
        if ($request->logo) {
            $partner->logo = uploadSingleImage($request->logo, 'partner');
        }

        $partner->title_en = $request->title_en;
        $partner->title_fr = $request->title_fr;
        $partner->description_en = $request->description_en;
        $partner->description_fr = $request->description_fr;
        $partner->url = $request->url;
        $partner->status = $request->status;
        $partner->save();

        CreateMessage('Partner');
        return redirect('/admin/partner');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('partner-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['partner'] = Partner::findOrFail($id);
        return view('backend.admin.partner.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('partner-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['partner'] = Partner::findOrFail($id);
        return view('backend.admin.partner.edit', $data);
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
        $authorize = checkPermissionToAccess('partner-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $partner = Partner::findOrFail($id);

        if ($request->logo) {
            //remove old image
            removeSingleOldImage($partner->logo, 'partner');
            //upload new image
            $partner->logo = uploadSingleImage($request->logo, 'partner');
        }
        $partner->title_en = $request->title_en;
        $partner->title_fr = $request->title_fr;
        $partner->description_en = $request->description_en;
        $partner->description_fr = $request->description_fr;
        $partner->url = $request->url;
        $partner->status = $request->status;
        $partner->update();

        UpdateMessage('Partner');
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
        $authorize = checkPermissionToAccess('partner-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $partner = Partner::find($id);
        //remove image from storage

        if ($partner->logo) {
            removeSingleOldImage($partner->logo, 'partner');
        }
        $partner->delete();
        return redirect('/admin/partner');
    }
}
