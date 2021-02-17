<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\models\Program;
use App\models\ProgramImage;
use App\models\ProgramVideo;
use App\models\Tag;
use App\models\Trainer;
use DB;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('program-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Program';
        $data['program'] = Program::latest()->paginate(12);

        return view('backend.admin.program.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('program-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['category'] = Category::select('id', 'name_en')->pluck('name_en', 'id');
        $data['trainers'] = Trainer::select('id', DB::raw("CONCAT(first_name,' ',last_name) AS text"))->where('status', 1)->where('email_verified', 1)->get()->pluck('text', 'id');
        $data['tags'] = Tag::select('id', 'name')->get()->pluck('name', 'id');
        return view('backend.admin.program.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $authorize = checkPermissionToAccess('program-create');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();

            $program = new Program;

            if ($request->video_url) {
                //parse the video url to get its host name
                $parsedUrl = '';
                if (!empty(parse_url($request->video_url)['host']))
                    if (!empty(parse_url($request->video_url)['host']))
                        $parsedUrl = parse_url($request->video_url)['host'];
                //check if it is a youtube video url
                if ($parsedUrl !== 'www.youtube.com') {
                    customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                    return back()->withInput($request->all());
                }

                $video_url = $request->video_url;
            }

            if ($request->image) {
                //uploads the image by image file and folder name and returns image name
                $image = uploadSingleImage($request->image, 'program');
            }

            $program->category_id = $request->category_id;
            $program->title_en = $request->title_en;
            $program->title_fr = $request->title_fr;
            $program->description_en = $request->description_en;
            $program->description_fr = $request->description_fr;
            $program->short_description_en = $request->short_description_en;
            $program->short_description_fr = $request->short_description_fr;
            $program->status = $request->status;
            $program->image = $image ?? null;
            $program->video_url = $video_url ?? null;
            $program->save();
            $program->update(['slug'=>str_slug($program->title_en,'-').'-'.$program->id]);

            //save all the trainer of this program
            if ($request->trainers) {
                $program->trainers()->sync($request->trainers);
            }
            //save all the tags of this program
            if ($request->tags) {
                $program->tags()->sync($request->tags);
            }

            //upload multiple images and videos using newly saved program model
            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'program');
                    $program->images()->create([
                        'image' => $image ?? null]);
                }
            }
            if (!empty($request->video_urls[0])) {
                foreach ($request->video_urls as $video_url) {
                    //parse the video url to get its host name
                    $parsedUrl = '';
                    if (!empty(parse_url($video_url)['host']))
                        if (!empty(parse_url($video_url)['host']))
                            $parsedUrl = parse_url($video_url)['host'];
                    //check if it is a youtube video url
                    if ($parsedUrl !== 'www.youtube.com') {
                        customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                        return back()->withInput($request->all());
                    }

                    $program->videos()->create([
                        'program_id' => $program->id,
                        'video_url' => $video_url
                    ]);
                }
            }

            DB::commit();
            CreateMessage('Program');

            return redirect('/admin/program');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Program!', 'Error');
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
        $authorize = checkPermissionToAccess('program-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['program'] = Program::findOrFail($id);
        return view('backend.admin.program.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('program-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['category'] = Category::select('id', 'name_en')->pluck('name_en', 'id');
        $data['program'] = Program::findOrFail($id);
        $data['trainers'] = Trainer::select('id', DB::raw("CONCAT(first_name,' ',last_name) AS text"))->where('status', 1)->where('email_verified', 1)->get()->pluck('text', 'id');
        $data['tags'] = Tag::select('id', 'name')->get()->pluck('name', 'id');

        return view('backend.admin.program.edit', $data);
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
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $authorize = checkPermissionToAccess('program-edit');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();

            $program = Program::findOrFail($id);

            if ($request->video_url) {
                //parse the video url to get its host name
                $parsedUrl = '';
                if (!empty(parse_url($request->video_url)['host']))
                    if (!empty(parse_url($request->video_url)['host']))
                        $parsedUrl = parse_url($request->video_url)['host'];
                //check if it is a youtube video url
                if ($parsedUrl !== 'www.youtube.com') {
                    customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                    return back()->withInput($request->all());
                }

                $program->video_url = $request->video_url;
            }

            if (!empty($request->video_urls[0])) {
                foreach ($request->video_urls as $video_url) {
                    //parse the video url to get its host name
                    $parsedUrl = '';
                    if (!empty(parse_url($video_url)['host']))
                        if (!empty(parse_url($video_url)['host']))
                            $parsedUrl = parse_url($video_url)['host'];
                    //check if it is a youtube video url
                    if ($parsedUrl !== 'www.youtube.com') {
                        customErrorMessage('Please Provide a valid Youtube URL', 'Error');
                        return back()->withInput($request->all());
                    }

                    $program->videos()->create([
                        'video_url' => $video_url
                    ]);
                }
            }

            if ($request->image) {
                //remove old image
                removeSingleOldImage($program->image, 'program');
                //uploads the image by image file and folder name and returns image name
                $program->image = uploadSingleImage($request->image, 'program');
            }

            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'program');
                    $program->images()->create(['image' => $image ?? null]);
                }
            }

            $program->category_id = $request->category_id;
            $program->title_en = $request->title_en;
            $program->title_fr = $request->title_fr;
            $program->description_en = $request->description_en;
            $program->description_fr = $request->description_fr;
            $program->short_description_en = $request->short_description_en;
            $program->short_description_fr = $request->short_description_fr;
            $program->status = $request->status;
            $program->update();

            //save all the trainer of this program
            if ($request->trainers) {
                $program->trainers()->sync($request->trainers);
            }

            //save all the tags of this program
            if ($request->tags) {
                $program->tags()->sync($request->tags);
            }

            DB::commit();
            UpdateMessage('Program');

            return back();
        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
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
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('program-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $program = Program::findOrFail($id);
        //remove banner image
        removeSingleOldImage($program->image, 'program');
        //remove multiple sub banner images
        foreach ($program->images as $img) {
            removeSingleOldImage($img->image, 'program');
        }
        //remove sub banner images from db
        $program->images()->delete();
        //remove sub videos
        $program->videos()->delete();

        //remove tags : for pivot tables do not use delete() instead use detach
        $program->tags()->detach();
        //remove trainers
        $program->trainers()->detach();

        $program->delete();
        DeleteMessage('Program');
        return back();
    }

    public function destroyImageItem($id)
    {
        $authorize = checkPermissionToAccess('program-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $program = ProgramImage::findOrFail($id);
        //delete single image if exist
        removeSingleOldImage($program->image, 'program');
        $program->delete();

        //display success toast message
        customSuccessMessage('Image removed successful!', 'Success');
        return back();
    }

    public function destroyVideoItem($id)
    {
        $authorize = checkPermissionToAccess('program-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $video = ProgramVideo::findOrFail($id);
        $video->delete();
        //display success toast message
        DeleteMessage('Video');
        return back();
    }
}
