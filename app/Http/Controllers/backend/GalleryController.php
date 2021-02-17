<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Gallery;
use App\models\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('gallery-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Gallery';
        $data['gallery'] = Gallery::latest()->paginate(8);
        return view('backend.admin.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('gallery-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Gallery';

        return view('backend.admin.gallery.create', $data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('gallery-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            DB::beginTransaction();

            $gallery = new Gallery;

            //upload gallery image
            if ($request->image) {
                //uploads the image by image file and folder name and returns image name
                $image = uploadSingleImage($request->image, 'gallery');
            }

            $gallery->title_en = $request->title_en;
            $gallery->title_fr = $request->title_fr;
            $gallery->description_en = $request->description_en;
            $gallery->description_fr = $request->description_fr;
            $gallery->status = $request->status;
            $gallery->image = $image ?? '';
            $gallery->save();
            $gallery->update(['slug'=>str_slug($gallery->title_en,'-').'-'.$gallery->id]);

            //upload multiple images and videos using newly saved program model
            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'gallery');
                    $gallery->images()->create([
                        'image' => $image ?? null]);
                }
            }

            DB::commit();
            //Toast Message
            CreateMessage('Gallery');

            return redirect('/admin/gallery');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Gallery!', 'Error');
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
        $authorize = checkPermissionToAccess('gallery-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['gallery'] = Gallery::find($id);
        return view('backend.admin.gallery.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('gallery-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['gallery'] = Gallery::find($id);
        return view('backend.admin.gallery.edit', $data);
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
        $authorize = checkPermissionToAccess('gallery-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $gallery = Gallery::find($id);

            //upload new image
            if ($request->image) {
                $folderName = 'gallery';
                //check if old image exist if yes then delete it
                removeSingleOldImage($gallery->image, $folderName);
                //upload new image
                $gallery->image = uploadSingleImage($request->image, $folderName);
            }

            //upload multiple inner images
            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'gallery');
                    $gallery->images()->create(['image' => $image ?? null]);
                }
            }

            $gallery->title_en = $request->title_en;
            $gallery->title_fr = $request->title_fr;
            $gallery->description_en = $request->description_en;
            $gallery->description_fr = $request->description_fr;
            $gallery->status = $request->status;
            $gallery->save();

            //Toast Update
            UpdateMessage('Gallery');

            return back();
        } catch (\Exception $e) {
            customErrorMessage('Failed to update Gallery!', 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    public function destroyImageItem($id)
    {
        $authorize = checkPermissionToAccess('gallery-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $gallery = GalleryImages::findOrFail($id);
        //delete single image if exist
        removeSingleOldImage($gallery->image, 'gallery');
        $gallery->delete();

        //display success toast message
        customSuccessMessage('Image removed successful!', 'Success');
        return back();
    }

    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('gallery-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $gallery = Gallery::find($id);
        //remove image from storage
        $folderName = 'gallery';

        //remove multiple sub banner images
        foreach ($gallery->images as $img) {
            removeSingleOldImage($img->image, 'gallery');
        }

        //remove sub banner images from db
        $gallery->images()->delete();

        //remove cover image
        removeSingleOldImage($gallery->image, $folderName);
        $gallery->delete();

        DeleteMessage('Gallery');

        return redirect('/admin/gallery');
    }
}
