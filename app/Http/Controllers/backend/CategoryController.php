<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('category-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Category';
        $data['category'] = Category::latest()->paginate(8);
        return view('backend.admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('category-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        return view('backend.admin.category.create');
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('category-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $request->validate([
            'name_en' => 'required|unique:categories,name_en',
            'name_fr' => 'required|unique:categories,name_fr',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();

            $category = new Category;

            //upload bod image
            if ($request->image) {
                $category->image = uploadSingleImage($request->image, 'category');
            }

            $category->order = $request->order;
            $category->name_en = $request->name_en;
            $category->name_fr = $request->name_fr;
            $category->status = $request->status;
            $category->save();
            $category->update(['slug' => str_slug($category->name_en, '-') . '-' . $category->id]);

            DB::commit();

            //Toast Message
            CreateMessage('Category');

            return redirect('/admin/category');
        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
            DB::rollback();
            return back();
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
        $authorize = checkPermissionToAccess('category-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['category'] = Category::find($id);
        return view('backend.admin.category.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('category-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['category'] = Category::find($id);
        return view('backend.admin.category.edit', $data);
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
        $authorize = checkPermissionToAccess('category-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();

            $category = Category::find($id);

            if ($request->image) {
                $folderName = 'category';
                //remove the previously uploaded image from storage
                //check if old image exist if yes then delete it
                removeSingleOldImage($category->image, $folderName);
                //upload new image
                $category->image = uploadSingleImage($request->image, $folderName);
            }
            $category->order = $request->order;
            $category->name_en = $request->name_en;
            $category->name_fr = $request->name_fr;
            $category->status = $request->status;
            $category->update();

            DB::commit();
            //Toast Message
            UpdateMessage('Category');
            return redirect('/admin/category');
        } catch (\Exception $e) {
            FailedMessage('Category');
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('category-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $category = Category::find($id);
        //remove image from storage
        $folderName = 'category';
        //check if old image exist if yes then delete it
        removeSingleOldImage($category->image, $folderName);
        $category->delete();

        DeleteMessage('Category');
        return redirect('/admin/category');
    }
}
