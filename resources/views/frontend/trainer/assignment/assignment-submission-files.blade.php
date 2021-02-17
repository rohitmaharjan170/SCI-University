@extends('frontend.trainer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <a href="{{url()->previous()}}"
                   class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Course Assignments</h3>
            <div class="row">
                @foreach($assignmentSubmissionFiles as $assignment)
                    <div class="col-md-4">
                        <div class="card w-55">
                            <div class="card-header">
                                <h5 class="text-danger mt-3">{{$assignment->title}}</h5>
                            </div>
                            <div class="card-body">
                                {!! $assignment->description !!}
                                uploaded on: <span class="text-success">{{formatDate($assignment->created_at)}}</span>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    @foreach($assignment->assignmentsubmissionfiles as $a)
                                        <div class="col-md-4">
                                            Download <a href="{{$a->getFilePathAttribute()}}" target="_blank"
                                                        download><span
                                                        class="badge badge-success badge-pill"><i
                                                            class="fas fa-download"></i></span></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection