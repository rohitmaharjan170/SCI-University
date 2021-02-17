<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Franchise;

use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('franchise-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['franchise'] = Franchise::latest()->paginate(8);
        return view('backend.admin.franchise.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('franchise-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.franchise.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('franchise-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $franchise = new Franchise;

        //upload partner image
        if ($request->logo) {
            $franchise->logo = uploadSingleImage($request->logo, 'franchise');
        }

        $franchise->company_name = $request->company_name;
        $franchise->title_en = $request->title_en;
        $franchise->title_fr = $request->title_fr;
        $franchise->description_en = $request->description_en;
        $franchise->description_fr = $request->description_fr;
        $franchise->url = $request->url;
        $franchise->status = $request->status;
        $franchise->save();

        CreateMessage('Franchise');
        return redirect('/admin/franchise');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('franchise-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['franchise'] = Franchise::findOrFail($id);
        return view('backend.admin.franchise.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('franchise-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['franchise'] = Franchise::findOrFail($id);
        return view('backend.admin.franchise.edit', $data);
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
        $authorize = checkPermissionToAccess('franchise-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $franchise = Franchise::findOrFail($id);

        if ($request->logo) {
            //remove old image
            removeSingleOldImage($franchise->logo, 'franchise');
            //upload new image
            $franchise->logo = uploadSingleImage($request->logo, 'franchise');
        }
        $franchise->company_name = $request->company_name;
        $franchise->title_en = $request->title_en;
        $franchise->title_fr = $request->title_fr;
        $franchise->description_en = $request->description_en;
        $franchise->description_fr = $request->description_fr;
        $franchise->url = $request->url;
        $franchise->status = $request->status;
        $franchise->update();

        UpdateMessage('Franchise');
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
        $authorize = checkPermissionToAccess('franchise-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $franchise = Franchise::findOrFail($id);
        //remove image from storage

        if ($franchise->logo) {
            removeSingleOldImage($franchise->logo, 'franchise');
        }
        $franchise->delete();
        return redirect('/admin/franchise');
    }
}
