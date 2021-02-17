@extends('frontend.student.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <a href="{{route('student.course.actions',[$courseId,'course-menu'])}}}}"
                   class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5>Choose for which assignment you want to submit</h5>
            <div class="row mt-3">
                @foreach($assignmentFiles as $key => $assignment)
                    <div class="col-md-4">
                        <div class="card w-55">
                            <div class="card-body">
                                <h4 class="card-title">{{$assignment->title}}</h4>
                                <p class="card-text">{!! $assignment->description !!}
                                    uploaded on: <span
                                            class="text-success">{{formatDate($assignment->created_at)}}</span></p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('student.submit.assignment.form',['course_id'=>$courseId,'assignment_id'=>encrypt($assignment->id)])}}"
                                   class="btn btn-danger mt-3">Submit
                                    Assignment</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$assignmentFiles->links()}}
        </div>
    </div>
@endsection