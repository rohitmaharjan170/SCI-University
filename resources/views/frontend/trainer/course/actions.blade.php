@extends('frontend.trainer.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{route('trainer.course.list')}}"
                           class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a ></h5>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>1</h3>

                                    <p>Upload Assignment</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                                <a href="{{route('trainer.upload.assignment.index', $courseId)}}"
                                   class="small-box-footer">Select <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>1</h3>

                                    <p>View Student Uploaded Assignments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                                <a href="{{route('trainer.show.uploaded.assignments', $courseId)}}"
                                   class="small-box-footer">Select <i class="fas fa-arrow-circle-right"></i></a>
{{--                                <a href="{{route('trainer.show.uploaded.assignments', $courseId)}}"--}}
{{--                                   class="small-box-footer">Select <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>1</h3>

                                    <p>View My Submitted Assignments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                                <a href="{{route('trainer.my.submitted.assignments', $courseId)}}"
                                   class="small-box-footer">Select <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>1</h3>
                                    <p>Send Message to Student</p>
                                </div>
                                <div class="icon text-dark">
                                    <i class="fab fa-facebook-messenger"></i>
                                </div>
                                <a href="{{route('trainer.course.chat',$courseId)}}"
                                   class="small-box-footer">Select <i class="fas fa-arrow-circle-right"></i></a>
                                {{--                                <a href="{{route('student.show.submitted.assignment',$courseId)}}" class="small-box-footer">Select <i--}}
                                {{--                                            class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row"></div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection