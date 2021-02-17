<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Team;
use App\models\TeamImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('team-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Team';
        $data['team'] = Team::latest()->paginate(8);
        return view('backend.admin.team.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('team-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.team.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $authorize = checkPermissionToAccess('team-create');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();

            $team = new Team;

            //upload team image
            if ($request->image) {
                $image = uploadSingleImage($request->image, 'team');
            }
            $teamStatus = $team->firstOrCreate([
                'name' => $request->name,
                'designation' => $request->designation,
                'details_en' => $request->details_en,
                'details_fr' => $request->details_fr,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'status' => $request->status,
                'image' => $image ?? ''
            ]);

            DB::commit();
            //Toast Message
            CreateMessage('Board Of Director');

            return redirect('/admin/team');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Team!', 'Error');
            DB::rollback();
            return back()->withInput($request->all());
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
        $authorize = checkPermissionToAccess('team-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['team'] = Team::find($id);
        return view('backend.admin.team.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('team-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['team'] = Team::find($id);
        return view('backend.admin.team.edit', $data);
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
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $authorize = checkPermissionToAccess('team-edit');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();

            $team = Team::find($id);

            //upload team image
            if ($request->image) {
                $folderName = 'team';
                //remove the previously uploaded image from storage
                //check if old image exist if yes then delete it
                removeSingleOldImage($team->image, $folderName);
                //upload new image
                $team->image = uploadSingleImage($request->image, $folderName);
            }

            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->details_en = $request->details_en;
            $team->details_fr = $request->details_fr;
            $team->facebook = $request->facebook;
            $team->instagram = $request->instagram;
            $team->twitter = $request->twitter;
            $team->linkedin = $request->linkedin;
            $team->status = $request->status;
            $team->update();

            DB::commit();
            //Toast Message
            UpdateMessage('Team');
            return redirect('/admin/team');
        } catch (\Exception $e) {
            FailedMessage('Team');
            DB::rollback();
            return back()->withInput($request->all());
        }
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
        $authorize = checkPermissionToAccess('team-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $team = Team::find($id);
        //remove image from storage
        $folderName = 'team';
        //check if old image exist if yes then delete it
        removeSingleOldImage($team->image, $folderName);
        $team->delete();

        DeleteMessage('Team');
        return redirect('/admin/team');
    }

}
