<?php

namespace App\Http\Controllers\backend;

use App\models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    public function index($page)
    {
        $authorize = checkPermissionToAccess('cms-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['cms'] = Cms::where('page_type', $page)->first();
        $data['title'] = '';
        if ($data['cms']->page_type === 'terms_and_conditions') {
            $data['title'] = 'Terms and Conditions';
        }
        if ($data['cms']->page_type === 'about_us') {
            $data['title'] = 'About Us';
        }
        if ($data['cms']->page_type === 'privacy_policy') {
            $data['title'] = 'Privacy Policy';
        }
        if ($data['cms']->page_type === 'contact_us') {
            $data['title'] = 'Contact Us';
        }

        return view('backend.admin.cms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $page
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $authorize = checkPermissionToAccess('cms-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['cms'] = Cms::find($page);
        return view('backend.admin.cms.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $page
     * @return \Illuminate\Http\Response
     */
    public function edit($page)
    {
        $authorize = checkPermissionToAccess('cms-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['cms'] = Cms::find($page);
        return view('backend.admin.cms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {
        $authorize = checkPermissionToAccess('cms-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $cms = Cms::find($page)->update($request->only(['content', 'status']));
        if ($cms)
            UpdateMessage('CMS');
        else
            FailedMessage('CMS');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($page)
    {

    }
}
