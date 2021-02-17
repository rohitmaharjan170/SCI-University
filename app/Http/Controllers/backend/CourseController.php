<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Course;
use App\models\CourseImage;
use App\models\CourseVideo;
use App\models\Program;
use App\models\Tag;
use App\models\Trainer;
use DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('course-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Course';
        $data['course'] = Course::latest()->paginate(12);

        return view('backend.admin.course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('course-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['programs'] = Program::select('id','title_en')->pluck('title_en','id');
        $data['trainers'] = Trainer::select('id', DB::raw("CONCAT(first_name,' ',last_name) AS text"))->where('status',1)->where('email_verified',1)->get()->pluck('text', 'id');
        $data['tags'] = Tag::select('id', 'name')->get()->pluck('name', 'id');
        return view('backend.admin.course.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $authorize = checkPermissionToAccess('course-create');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();

            $course = new Course;

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
                $image = uploadSingleImage($request->image, 'course');
            }

            $course->program_id = $request->program_id;
            $course->trainer_id = $request->trainer_id;
            $course->title_en = $request->title_en;
            $course->title_fr = $request->title_fr;
            $course->description_en = $request->description_en;
            $course->description_fr = $request->description_fr;
            $course->short_description_en = $request->short_description_en;
            $course->short_description_fr = $request->short_description_fr;
            $course->price = $request->price;
            $course->discount = $request->discount;
            $course->rating = $request->rating;
            $course->status = $request->status;
            $course->image = $image ?? null;
            $course->video_url = $video_url ?? null;
            $course->save();
            $course->update(['slug'=>str_slug($course->title_en,'-').'-'.$course->id]);

            //save all the tags of this course
            if ($request->tags) {
                $course->tags()->sync($request->tags);
            }

            //upload multiple images and videos using newly saved course model
            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'course');
                    $course->images()->create([
                        'course_id' => $course->id,
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

                    $course->videos()->create([
                        'course_id' => $course->id,
                        'video_url' => $video_url
                    ]);
                }
            }

            DB::commit();
            CreateMessage('Course');

            return redirect('/admin/course');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Course!', 'Error');
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
        $authorize = checkPermissionToAccess('course-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['course'] = Course::findOrFail($id);
        return view('backend.admin.course.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('course-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['programs'] = Program::select('id','title_en')->pluck('title_en','id');
        $data['course'] = Course::findOrFail($id);
        $data['trainers'] = Trainer::select('id', DB::raw("CONCAT(first_name,' ',last_name) AS text"))->where('status',1)->where('email_verified',1)->get()->pluck('text', 'id');

        $data['tags'] = Tag::select('id', 'name')->get()->pluck('name', 'id');

        return view('backend.admin.course.edit', $data);
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
        try {
            $authorize = checkPermissionToAccess('course-edit');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            DB::beginTransaction();

            $course = Course::findOrFail($id);

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

                $course->video_url = $request->video_url;
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

                    $course->videos()->create([
                        'video_url' => $video_url
                    ]);
                }
            }

            if ($request->image) {
                //remove old image
                removeSingleOldImage($course->image, 'course');
                //uploads the image by image file and folder name and returns image name
                $course->image = uploadSingleImage($request->image, 'course');
            }

            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'course');
                    $course->images()->create(['image' => $image ?? null]);
                }
            }
            $course->program_id = $request->program_id;
            $course->trainer_id = $request->trainer_id;
            $course->title_en = $request->title_en;
            $course->title_fr = $request->title_fr;
            $course->description_en = $request->description_en;
            $course->description_fr = $request->description_fr;
            $course->short_description_en = $request->short_description_en;
            $course->short_description_fr = $request->short_description_fr;
            $course->price = $request->price;
            $course->discount = $request->discount;
            $course->rating = $request->rating;
            $course->status = $request->status;
            $course->update();
            //save all the tags of this course
            if ($request->tags) {
                $course->tags()->sync($request->tags);
            }

            DB::commit();
            UpdateMessage('Course');

            return back();
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Course!', 'Error');
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
        $authorize = checkPermissionToAccess('course-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $course = Course::findOrFail($id);
        //remove banner image
        removeSingleOldImage($course->image, 'course');
        //remove multiple sub banner images
        foreach ($course->images as $img) {
            removeSingleOldImage($img->image, 'course');
        }
        //remove sub banner images from db
        $course->images()->delete();
        //remove sub videos
        $course->videos()->delete();

        //remove tags : for pivot tables do not use delete() instead use detach
        $course->tags()->detach();

        $course->delete();
        DeleteMessage('Course');
        return back();
    }

    public function destroyImageItem($id)
    {
        $authorize = checkPermissionToAccess('course-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $course = CourseImage::findOrFail($id);
        //delete single image if exist
        removeSingleOldImage($course->image, 'course');
        $course->delete();

        //display success toast message
        customSuccessMessage('Image removed successful!', 'Success');
        return back();
    }

    public function destroyVideoItem($id)
    {
        $authorize = checkPermissionToAccess('course-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $video = CourseVideo::findOrFail($id);
        $video->delete();
        //display success toast message
        DeleteMessage('Video');
        return back();
    }
}
