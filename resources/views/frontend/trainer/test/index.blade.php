@extends('frontend.student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Choose Program</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::open(['method'=>'POST','route'=>['student.start.test'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('programs','Program',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::select('programs', $programs, old('programs'), ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Start Test</button>
                    </div>

                    {!! Form::close() !!}
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection


