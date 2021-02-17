<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\FeaturedStudent;
use Illuminate\Http\Request;

class FeaturedStudentController extends Controller
{
    public function index()
    {
//        $authorize = checkPermissionToAccess('notice-list');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }

        $data['title'] = 'Featured Student';
        $data['featuredStudents'] = FeaturedStudent::latest()->paginate(8);
        return view('backend.admin.featured-student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $authorize = checkPermissionToAccess('notice-create');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }

        $data['title'] = 'Featured Student';

        return view('backend.admin.featured-student.create', $data);
    }

    public function store(Request $request)
    {
//        $authorize = checkPermissionToAccess('notice-create');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'description' => 'required',
        ]);

        $featuredStudent = new FeaturedStudent;

        //upload featured student image
        if ($request->image) {
            //uploads the image by image file and folder name and returns image name
            $image = uploadSingleImage($request->image, 'featured-student');
        }

        $featuredStudent->name = $request->name;
        $featuredStudent->title = $request->title;
        $featuredStudent->description = $request->description;
        $featuredStudent->status = $request->status;
        $featuredStudent->image = $image ?? '';
        $featuredStudent->save();

        //Toast Message
        CreateMessage('Featured Student');

        return redirect('/admin/featuredstudent');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
//        $authorize = checkPermissionToAccess('notice-list');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }

        $data['featuredStudent'] = FeaturedStudent::find($id);
        return view('backend.admin.featured-student.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
//        $authorize = checkPermissionToAccess('notice-edit');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }

        $data['featuredStudent'] = FeaturedStudent::find($id);
        return view('backend.admin.featured-student.edit', $data);
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
//        $authorize = checkPermissionToAccess('notice-edit');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $featuredStudent = FeaturedStudent::find($id);

        //upload new image
        if ($request->image) {
            $folderName = 'featured-student';
            //check if old image exist if yes then delete it
            removeSingleOldImage($featuredStudent->image, $folderName);
            //upload new image
            $featuredStudent->image = uploadSingleImage($request->image, $folderName);
        }

        $featuredStudent->name = $request->name;
        $featuredStudent->title = $request->title;
        $featuredStudent->description = $request->description;
        $featuredStudent->status = $request->status;
        $featuredStudent->update();

        //Toast Update
        UpdateMessage('Featured Student');

        return redirect('/admin/featuredstudent');
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
//        $authorize = checkPermissionToAccess('notice-delete');
//        if (!$authorize) {
//            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
//            return back();
//        }

        $featuredStudent = FeaturedStudent::findOrFail($id);
        //remove image from storage
        $folderName = 'featured-student';
        removeSingleOldImage($featuredStudent->image, $folderName);
        $featuredStudent->delete();

        DeleteMessage('Featured Student');
        return redirect('/admin/featuredstudent');
    }
}
