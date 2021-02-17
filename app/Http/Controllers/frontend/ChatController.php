<?php

namespace App\Http\Controllers\frontend;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\models\Course;
use App\models\Message;
use App\models\Student;
use App\models\Trainer;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $data['title'] = 'Send Message';
        //todo: count how many messages are unread from the selected user

        if (auth('student')->check()) {
            $data['users'] = Trainer::all();
            $data['messages'] = Message::where('to', auth('student')->user()->id)->get();
            return view('frontend.student.chat.index', $data);
        }

        if (auth('trainer')->check()) {
            $data['users'] = Student::all();
            $data['messages'] = Message::where('to', auth('trainer')->user()->id)->get();
            return view('frontend.trainer.chat.index', $data);
        }

    }

    public function getMessage($user_id)
    {
        if (auth('student')->check()) {
            $my_id = auth('student')->user()->id;

            // mark the message as read
            Message::where(['from' => $user_id, 'to' => $my_id, 'is_trainer' => 1])->update(['seen' => 1]);

            // get all received messages from student
            $data['messages'] = Message::where(function ($query) use ($user_id, $my_id) {
                $query->where('from', $user_id)->where('to', $my_id);
            })->orWhere(function ($query) use ($user_id, $my_id) {
                $query->where('from', $my_id)->where('to', $user_id);
            })->get();

            return view('frontend.student.chat.messages', $data);
        }

        if (auth('trainer')->check()) {
            $my_id = auth('trainer')->user()->id;

            // mark the message as read
            Message::where(['from' => $user_id, 'to' => $my_id, 'is_trainer' => 0])->update(['seen' => 1]);

            // get all received messages from student
            $data['messages'] = Message::where(function ($query) use ($user_id, $my_id) {
                $query->where('from', $user_id)->where('to', $my_id);
            })->orWhere(function ($query) use ($user_id, $my_id) {
                $query->where('from', $my_id)->where('to', $user_id);
            })->get();

            return view('frontend.trainer.chat.messages', $data);
        }
    }

    public function sendMessage(Request $request)
    {
        if (auth('student')->check()) {
            $from = auth('student')->user()->id;
            $is_trainer = 0;

        }
        if (auth('trainer')->check()) {
            $from = auth('trainer')->user()->id;
            $is_trainer = 1;
        }

        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message;
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->seen = 0; // message will be unread when sending message
        $data->is_trainer = $is_trainer;
        $data->save();

        return response()->json(['receiver_id'=>$to]);
    }


    public function courseChat($course_id)
    {
        $courseId = decrypt($course_id);
        $course = Course::find($courseId);

        $data['title'] = 'Send Message';
        //todo: count how many messages are unread from the selected user

        if (auth('student')->check()) {
            $data['user'] = $course->trainer;
            $data['messages'] = Message::where('to', auth('student')->user()->id)->get();
            return view('frontend.student.course.chat.index', $data);
        }

        if (auth('trainer')->check()) {
            $data['users'] = $course->students;
            $data['messages'] = Message::where('to', auth('trainer')->user()->id)->get();
            return view('frontend.trainer.course.chat.index', $data);
        }

    }
}
