@extends('frontend.trainer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <a href="{{route('trainer.course.actions',['course_id'=>encrypt($courseId),'course-actions'])}}"
                   class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Course Assignments</h3>
            <div class="row">
                @foreach($assignmentFiles as $key => $assignment)
                    <div class="col-md-4">
                        <div class="card w-55">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="text-danger mt-3">{{$assignment->title}}</h5>
                                </div>
                                <div class="card-body">
                                    {!! $assignment->description !!}
                                    uploaded on: <span
                                            class="text-success">{{formatDate($assignment->created_at)}}</span>
                                    <div class="row mt-3">
                                        @foreach($assignment->assignmentfiles as $a)
                                            <div class="col-md-4">
                                                Download<a href="{{$a->getFilePathAttribute()}}" target="_blank"
                                                            download><span
                                                            class="badge badge-success badge-pill"><i
                                                                class="fas fa-download"></i></span></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('trainer.assignment.disable',encrypt($assignment->id))}}"
                                   class="btn {{$assignment->status ? 'btn-success' : 'btn-danger'}}">{{$assignment->status ? 'Active' : 'In-Active'}}</a>
                                <a href="{{route('trainer.assignment.edit',['id'=>encrypt($assignment->id),'course_id'=>encrypt($courseId)])}}" class="btn btn-info">Edit</a>
                                <a href="{{route('trainer.assignment.delete',encrypt($assignment->id))}}" onclick="return confirm('are you sure?');" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$assignmentFiles->links()}}
        </div>
    </div>
@endsection