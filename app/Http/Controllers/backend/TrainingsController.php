<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Tag;
use App\models\Trainer;
use App\models\Training;
use App\models\TrainingImage;
use App\models\TrainingVideo;
use DB;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('training-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Training';
        $data['training'] = Training::latest()->paginate(12);

        return view('backend.admin.training.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('training-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['trainers'] = Trainer::select('id', DB::raw("CONCAT(first_name,' ',last_name) AS text"))->where('status', 1)->where('email_verified', 1)->get()->pluck('text', 'id');
        $data['tags'] = Tag::select('id', 'name')->get()->pluck('name', 'id');
        return view('backend.admin.training.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('training-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            DB::beginTransaction();

            $training = new Training;

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
                $image = uploadSingleImage($request->image, 'training');
            }

            $training->title_en = $request->title_en;
            $training->title_fr = $request->title_fr;
            $training->description_en = $request->description_en;
            $training->description_fr = $request->description_fr;
            $training->short_description_en = $request->short_description_en;
            $training->short_description_fr = $request->short_description_fr;
            $training->price = $request->price;
            $training->discount = $request->discount;
            $training->rating = $request->rating;
            $training->status = $request->status;
            $training->image = $image ?? null;
            $training->video_url = $video_url ?? null;
            $training->save();
            $training->update(['slug' => str_slug($training->title_en, '-') . '-' . $training->id]);

            //save all the trainer of this training
            if ($request->trainers) {
                $training->trainers()->sync($request->trainers);
            }
            //save all the tags of this training
            if ($request->tags) {
                $training->tags()->sync($request->tags);
            }

            //upload multiple images and videos using newly saved training model
            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'training');
                    $training->images()->create([
                        'training_id' => $training->id,
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

                    $training->videos()->create([
                        'training_id' => $training->id,
                        'video_url' => $video_url
                    ]);
                }
            }

            DB::commit();
            CreateMessage('Training');

            return redirect('/admin/training');
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Training!', 'Error');
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
        $authorize = checkPermissionToAccess('training-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['training'] = Training::findOrFail($id);
        return view('backend.admin.training.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('training-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['training'] = Training::findOrFail($id);
        $data['trainers'] = Trainer::select('id', DB::raw("CONCAT(first_name,' ',last_name) AS text"))->where('status', 1)->where('email_verified', 1)->get()->pluck('text', 'id');

        $data['tags'] = Tag::select('id', 'name')->get()->pluck('name', 'id');

        return view('backend.admin.training.edit', $data);
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
        $authorize = checkPermissionToAccess('training-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {

            DB::beginTransaction();

            $training = Training::findOrFail($id);

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

                $training->video_url = $request->video_url;
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

                    $training->videos()->create([
                        'video_url' => $video_url
                    ]);
                }
            }

            if ($request->image) {
                //remove old image
                removeSingleOldImage($training->image, 'training');
                //uploads the image by image file and folder name and returns image name
                $training->image = uploadSingleImage($request->image, 'training');
            }

            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {
                    //uploads the image by image file and folder name and returns image name
                    $image = uploadSingleImage($image, 'training');
                    $training->images()->create(['image' => $image ?? null]);
                }
            }

            $training->title_en = $request->title_en;
            $training->title_fr = $request->title_fr;
            $training->description_en = $request->description_en;
            $training->description_fr = $request->description_fr;
            $training->short_description_en = $request->short_description_en;
            $training->short_description_fr = $request->short_description_fr;
            $training->price = $request->price;
            $training->discount = $request->discount;
            $training->rating = $request->rating;
            $training->status = $request->status;
            $training->update();

            //save all the trainer of this training
            if ($request->trainers) {
                $training->trainers()->sync($request->trainers);
            }

            //save all the tags of this training
            if ($request->tags) {
                $training->tags()->sync($request->tags);
            }

            DB::commit();
            UpdateMessage('Training');

            return back();
        } catch (\Exception $e) {
            customErrorMessage('Failed to create Training!', 'Error');
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
        $authorize = checkPermissionToAccess('training-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $training = Training::findOrFail($id);
        //remove banner image
        removeSingleOldImage($training->image, 'training');
        //remove multiple sub banner images
        foreach ($training->images as $img) {
            removeSingleOldImage($img->image, 'training');
        }
        //remove sub banner images from db
        $training->images()->delete();
        //remove sub videos
        $training->videos()->delete();

        //remove tags : for pivot tables do not use delete() instead use detach
        $training->tags()->detach();
        //remove trainers
        $training->trainers()->detach();

        $training->delete();
        DeleteMessage('Training');
        return back();
    }

    public function destroyImageItem($id)
    {
        $authorize = checkPermissionToAccess('training-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $training = TrainingImage::findOrFail($id);
        //delete single image if exist
        removeSingleOldImage($training->image, 'training');
        $training->delete();

        //display success toast message
        customSuccessMessage('Image removed successful!', 'Success');
        return back();
    }

    public function destroyVideoItem($id)
    {
        $authorize = checkPermissionToAccess('training-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $video = TrainingVideo::findOrFail($id);
        $video->delete();
        //display success toast message
        DeleteMessage('Video');
        return back();
    }

    public function enrolledStudents($id)
    {
        $training = Training::find($id);
        $data['students'] = $training->students();

        return view('backend.admin.training-enrolled.index', $data);
    }
}
