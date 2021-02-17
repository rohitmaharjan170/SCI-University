@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.exam.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{--                    {!! Form::open(['method'=>'get','route'=>['admin.exam.store'],'files'=>true]) !!}--}}
                    {!! Form::open(['method'=>'POST','route'=>['admin.exam.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!!Form::label('course_id','Course',['class'=>'col-form-label']) !!}
                        {!! Form::select('course_id', $course, old('course_id'), ['class'=>'form-control','placeholder'=>'Select Course']) !!}
                        @if ($errors->first('course_id'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('course_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('training_id','Trainings',['class'=>'col-form-label']) !!}
                        {!! Form::select('training_id', $training, old('training_id'), ['class'=>'form-control','placeholder'=>'Select Training']) !!}
                        @if ($errors->first('training_id'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('training_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('exam_title_en','Exam Title (en)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::text('exam_title_en',old('exam_title_en'),['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if ($errors->first('exam_title_en'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('exam_title_en') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('exam_title_fr','Exam Title (fr)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::text('exam_title_fr',old('exam_title_fr'),['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if ($errors->first('exam_title_fr'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('exam_title_fr') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('exam_description_en','Exam Description (en)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::textarea('exam_description_en',old('exam_description_en'),['class'=>"form-control"]) !!}
                        @if ($errors->first('exam_description_en'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('exam_description_en') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('exam_description_fr','Exam Description (fr)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::textarea('exam_description_fr',old('exam_description_fr'),['class'=>"form-control"]) !!}
                        @if ($errors->first('exam_description_fr'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('exam_description_fr') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('total_marks','Total Marks',['class'=>'col-form-label']) !!}
                        {!! Form::number('total_marks',old('total_marks'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('total_marks'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('total_marks') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('time_duration','Total Duration (Minutes)',['class'=>'col-form-label']) !!}
                                {!! Form::number('time_duration',old('time_duration'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('time_duration'))
                                    <span class="text-danger">
                                <strong>{{ $errors->first('time_duration') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('exam_date','Exam Date',['class'=>'col-form-label']) !!}
                                {!! Form::input('datetime-local', 'exam_date', old('exam_date'), ['class' => 'form-control datetime']) !!}
                                @if ($errors->first('exam_date'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('exam_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('total_subjective_question','Total Subjective Question',['class'=>'col-form-label']) !!}
                        {!! Form::number('total_subjective_question',old('total_subjective_question'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('total_subjective_question'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('total_subjective_question') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('total_objective_question','Total Objective Question',['class'=>'col-form-label']) !!}
                        {!! Form::number('total_objective_question',old('total_objective_question'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('total_objective_question'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('total_objective_question') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                {!! Form::close() !!}
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
@endsection
