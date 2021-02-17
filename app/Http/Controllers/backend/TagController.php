<?php

namespace App\Http\Controllers\backend;

use App\models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('tags-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['title'] = 'Tags';
        $data['tags'] = Tag::latest()->paginate(20);

        return view('backend.admin.tag.index', $data);
    }

    public function create()
    {
        $authorize = checkPermissionToAccess('tags-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        return view('backend.admin.tag.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('tags-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $request->validate([
            'name' => 'required'
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        CreateMessage('Tags');

        return redirect('/admin/tags');
    }

    public function edit($id)
    {
        $authorize = checkPermissionToAccess('tags-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['tag'] = Tag::findOrFail($id);

        return view('backend.admin.tag.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $authorize = checkPermissionToAccess('tags-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->name
        ]);

        UpdateMessage('Tags');

        return back();
    }

    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('tags-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $tag = Tag::findOrFail($id);
        $tag->delete();

        DeleteMessage('Tags');
        return redirect('/admin/tags');
    }
}
