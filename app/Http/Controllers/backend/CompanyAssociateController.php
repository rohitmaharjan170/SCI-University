<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\BoardOfDirector;
use App\models\CompanyAssociate;
use Illuminate\Http\Request;

class CompanyAssociateController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('associate-project-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['companyAssociate'] = CompanyAssociate::latest()->paginate(8);
        return view('backend.admin.company-associate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('associate-project-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.company-associate.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('associate-project-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $companyAssociate = new CompanyAssociate;

        //upload partner image
        if ($request->logo) {
            $companyAssociate->logo = uploadSingleImage($request->logo, 'company-associate');
        }

        $companyAssociate->company_name = $request->company_name;
        $companyAssociate->title_en = $request->title_en;
        $companyAssociate->title_fr = $request->title_fr;
        $companyAssociate->description_en = $request->description_en;
        $companyAssociate->description_fr = $request->description_fr;
        $companyAssociate->url = $request->url;
        $companyAssociate->status = $request->status;
        $companyAssociate->save();
        $companyAssociate->update(['slug'=>str_slug($companyAssociate->title_en,'-').'-'.$companyAssociate->id]);

        CreateMessage('Companies Associates Projects');
        return redirect('/admin/company-associate');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('associate-project-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['companyAssociate'] = CompanyAssociate::findOrFail($id);
        return view('backend.admin.company-associate.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('associate-project-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['companyAssociate'] = CompanyAssociate::findOrFail($id);
        return view('backend.admin.company-associate.edit', $data);
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
        $authorize = checkPermissionToAccess('associate-project-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $companyAssociate = CompanyAssociate::findOrFail($id);

        if ($request->logo) {
            //remove old image
            removeSingleOldImage($companyAssociate->logo, 'company-associate');
            //upload new image
            $companyAssociate->logo = uploadSingleImage($request->logo, 'company-associate');
        }
        $companyAssociate->company_name = $request->company_name;
        $companyAssociate->title_en = $request->title_en;
        $companyAssociate->title_fr = $request->title_fr;
        $companyAssociate->description_en = $request->description_en;
        $companyAssociate->description_fr = $request->description_fr;
        $companyAssociate->url = $request->url;
        $companyAssociate->status = $request->status;
        $companyAssociate->update();

        UpdateMessage('Companies Associates Projects');
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
        $authorize = checkPermissionToAccess('associate-project-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $companyAssociate = CompanyAssociate::findOrFail($id);
        //remove image from storage

        if ($companyAssociate->logo) {
            removeSingleOldImage($companyAssociate->logo, 'company-associate');
        }
        $companyAssociate->delete();
        return redirect('/admin/company-associate');
    }
}
