@extends('frontend.trainer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <a href="{{route('trainer.show.uploaded.assignments',encrypt($courseId))}}"
                   class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5>Students who submitted assignments</h5>
            <div class="row">
                @foreach($students->chunk(5) as $student)
                    <input type="hidden" name="course_id" value="{{$courseId}}">
                    <input type="hidden" name="assignment_id" value="{{$assignmentId}}">
                    <div class="col-md-3 mt-2 text-center">
                        @foreach($student as $s)
                            <a href="{{route('trainer.show.student.assignment',['course_id'=>encrypt($courseId),'assignment_id'=>encrypt($assignmentId),'student_id'=>encrypt($s->id)])}}" class="btn btn-block btn-outline-success btn-lg text-success">{{$s->name}}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection