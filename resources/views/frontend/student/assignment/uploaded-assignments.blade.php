@extends('frontend.student.layouts.app')

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
            <h3>Course Assignments Materials</h3>
            <div class="row">
                @foreach($assignmentFiles as $key => $assignment)
                    <div class="col-md-4">
                        <div class="card w-55">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5 class="text-danger mt-3">{{$assignment->title}}</h5>
                                </div>
                                <div class="card-text">
                                    {!! $assignment->description !!}
                                </div>
                                uploaded on: <span class="text-success">{{formatDate($assignment->created_at)}}</span>
                                <br>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row">
                                    @foreach($assignment->assignmentfiles as $a)
                                        <div class="col-md-4">
                                            Download <a href="{{$a->getFilePathAttribute()}}" target="_blank" download><span
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
            {{$assignmentFiles->links()}}
        </div>
    </div>
@endsection