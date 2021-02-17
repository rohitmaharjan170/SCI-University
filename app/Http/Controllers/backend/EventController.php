<?php

namespace App\Http\Controllers\backend;

use App\models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('event-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Event';
        $data['event'] = Event::latest()->paginate(8);
        return view('backend.admin.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('event-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Event';

        return view('backend.admin.event.create', $data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('event-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $event = new Event;

        //upload press image
        if ($request->image) {
            //uploads the image by image file and folder name and returns image name
            $image = uploadSingleImage($request->image, 'event');
        }

        $event->title_en = $request->title_en;
        $event->title_fr = $request->title_fr;
        $event->description_en = $request->description_en;
        $event->description_fr = $request->description_fr;
        $event->status = $request->status;
        $event->image = $image ?? '';
        $event->save();
        $event->update(['slug'=>str_slug($event->title_en,'-').'-'.$event->id]);

        //Toast Message
        CreateMessage('Event');

        return redirect('/admin/event');
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
        $authorize = checkPermissionToAccess('event-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['event'] = Event::find($id);
        return view('backend.admin.event.view', $data);
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
        $authorize = checkPermissionToAccess('event-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['event'] = Event::find($id);
        return view('backend.admin.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $authorize = checkPermissionToAccess('event-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $event = Event::find($id);

        //upload new image
        if ($request->image) {
            $folderName = 'event';
            //check if old image exist if yes then delete it
            removeSingleOldImage($event->image, $folderName);
            //upload new image
            $event->image = uploadSingleImage($request->image, $folderName);
        }

        $event->title_en = $request->title_en;
        $event->title_fr = $request->title_fr;
        $event->description_en = $request->description_en;
        $event->description_fr = $request->description_fr;
        $event->status = $request->status;
        $event->save();

        //Toast Update
        UpdateMessage('Event');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('event-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $event = Event::find($id);
        //remove image from storage
        $folderName = 'event';
        removeSingleOldImage($event->image, $folderName);
        $event->delete();

        return redirect('/admin/event');
    }
}
