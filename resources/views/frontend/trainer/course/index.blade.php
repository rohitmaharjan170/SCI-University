@extends('frontend.trainer.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">My all course</h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach($courses as $key => $course)
                            @foreach($course as $key=>$c)
                                @if($key === 0)
                                    <div class="col-md-12">
                                        <h5>{{$c->program->title_en}}</h5>
                                    </div>
                                @endif
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{$key+1}}</h3>

                                            <p>{{$c->title_en}}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <a href="{{$c->trainerCoursePath()}}" class="small-box-footer">Enter course <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                        @endforeach
                    @endforeach
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