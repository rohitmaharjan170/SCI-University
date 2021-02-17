<?php

namespace App\Http\Controllers\backend;

use App\models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingsController extends Controller
{

    public function index()
    {
        $authorize = checkPermissionToAccess('site-settings-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Site Settings';
        $data['siteSettings'] = SiteSetting::first();

        return view('backend.admin.site-settings', $data);
    }

    public function update(Request $request, $id)
    {
        $authorize = checkPermissionToAccess('site-settings-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $request->validate([
            'primary_email' => 'email|nullable',
            'primary_mobile' => 'numeric|min:5|nullable',
            'contact_hotline' => 'numeric|min:5|nullable',
            'contact_mobile' => 'numeric|min:5|nullable',
            'contact_jobseeker' => 'numeric|min:5|nullable',
            'contact_url' => 'url|nullable',
            'facebook' => 'url|nullable',
            'instagram' => 'url|nullable',
            'twitter' => 'url|nullable',
            'linkedin' => 'url|nullable',
            'pinterest' => 'url|nullable',
        ]);

        $siteSettings = SiteSetting::find($id);
        $siteSettings->update($request->all());

        UpdateMessage('Site Settings');
        return back();
    }

}
