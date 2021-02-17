@extends('frontend.student.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <a href="{{route('student.show.uploaded.assignmentlist',encrypt($courseId))}}"
                   class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Course Assignment Submission</h3>
            <div class="row">
                @foreach($assignmentSubmissionFiles as $assignment)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-danger mt-3">{{$assignment->title}}</h5>
                            </div>
                            <div class="card-body">
                                {!! $assignment->description !!}
                                uploaded on: <span class="text-success">{{formatDate($assignment->created_at)}}</span>
                                <hr>
                                <div class="row">
                                    @foreach($assignment->assignmentsubmissionfiles as $a)
                                        <div class="col-md-4">
                                            Download <a href="{{$a->getFilePathAttribute()}}" target="_blank" download><span
                                                        class="badge badge-success badge-pill"><i
                                                            class="fas fa-download"></i></span></a>
                                            <br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer">
                                @php
                                    //encrypt assignment submission id
                                    $aid = encrypt($assignment->id);
                                @endphp
                                <a href="{{route('student.assignment.edit',['id'=>$aid,'assignment_id'=>encrypt($assignmentId),'course_id'=>encrypt ($courseId)])}}" class="btn btn-info">Edit</a>
                                <a href="{{route('student.assignment.delete',$aid)}}" onclick="return confirm('are you sure?');" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection