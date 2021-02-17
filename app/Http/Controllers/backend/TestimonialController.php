<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use DB;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('testimonial-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Testimonial';
        $data['testimonials'] = Testimonial::latest()->paginate(8);
        return view('backend.admin.testimonial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('testimonial-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('testimonial-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            DB::beginTransaction();

            $testimonial = new Testimonial;

            //upload testimonial image
            if ($request->image) {
                $image = uploadSingleImage($request->image, 'testimonial');
            }
            $testimonial->name = $request->name;
            $testimonial->title_en = $request->title_en;
            $testimonial->title_fr = $request->title_fr;
            $testimonial->body_en = $request->body_en;
            $testimonial->body_fr = $request->body_fr;
            $testimonial->status = $request->status;
            $testimonial->image = $image ?? '';
            $testimonial->save();

            DB::commit();
            //Toast Message
            CreateMessage('Testimonial');

            return redirect('/admin/testimonial');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Testimonial!', 'Error');
            DB::rollback();
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
        $authorize = checkPermissionToAccess('testimonial-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['testimonial'] = Testimonial::find($id);
        return view('backend.admin.testimonial.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('testimonial-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['testimonial'] = Testimonial::find($id);
        return view('backend.admin.testimonial.edit', $data);
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
        $authorize = checkPermissionToAccess('testimonial-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        try {
            DB::beginTransaction();

            $testimonial = Testimonial::find($id);

            //upload testimonial image
            if ($request->image) {
                $folderName = 'testimonial';
                //remove the previously uploaded image from storage
                //check if old image exist if yes then delete it
                removeSingleOldImage($testimonial->image, $folderName);
                //upload new image
                $testimonial->image = uploadSingleImage($request->image, $folderName);
            }

            $testimonial->name = $request->name;
            $testimonial->title_en = $request->title_en;
            $testimonial->title_fr = $request->title_fr;
            $testimonial->body_en = $request->body_en;
            $testimonial->body_fr = $request->body_fr;
            $testimonial->status = $request->status;
            $testimonial->update();

            DB::commit();
            //Toast Message
            UpdateMessage('Testimonial');
            return redirect('/admin/testimonial');
        } catch (\Exception $e) {
            FailedMessage('Testimonial');
            DB::rollback();
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
        $authorize = checkPermissionToAccess('testimonial-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $testimonial = Testimonial::find($id);
        //remove image from storage
        $folderName = 'testimonial';
        //check if old image exist if yes then delete it
        removeSingleOldImage($testimonial->image, $folderName);
        $testimonial->delete();

        DeleteMessage('Testimonial');
        return redirect('/admin/testimonial');
    }

}
