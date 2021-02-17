<?php

namespace App\Http\Controllers\backend;

use App\models\Career;
use App\models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('career-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Career';
        $data['career'] = Career::latest()->paginate(20);

        return view('backend.admin.career.index', $data);
    }

    public function create()
    {
        $authorize = checkPermissionToAccess('career-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.career.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('career-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $request->validate([
            'title_en' => 'required'
        ]);

        Career::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'status' => $request->status
        ]);

        CreateMessage('Career');

        return redirect('/admin/career');
    }

    public function edit($id)
    {
        $authorize = checkPermissionToAccess('career-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['career'] = Career::findOrFail($id);

        return view('backend.admin.career.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $authorize = checkPermissionToAccess('career-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $career = Career::findOrFail($id);
        $career->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'status' => $request->status
        ]);

        UpdateMessage('Career');

        return back();
    }

    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('career-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $career = Career::findOrFail($id);
        $career->delete();

        DeleteMessage('Career');
        return redirect('/admin/career');
    }
}
