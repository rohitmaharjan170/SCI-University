@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.question.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($question,['method'=>'PUT','route'=>['admin.question.update',$question->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!!Form::label('question_title_en','Question Title (en)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::text('question_title_en',old('question_title_en'),['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if ($errors->first('question_title_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('question_title_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('question_title_fr','Question Title (fr)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::text('question_title_fr',old('question_title_fr'),['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if ($errors->first('question_title_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('question_title_fr') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        @foreach($question->options as $key => $option)
                            {!!Form::label('option','Option '.($key+1),['class'=>'col-form-label col-lg-2']) !!}
                            <input class="form-control mt-1" maxlength="191" name="option[{{$option->id}}]" type="text"
                                   value="{{$option->option}}">
                        @endforeach
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('correct','Correct Answer',['class'=>'col-form-label']) !!}
                                {!! Form::select('correct', $options , old('correct'), ['class'=>'form-control correct','placeholder'=>'']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!!Form::label('question_description_en','Question Description (en)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::textarea('question_description_en',old('question_description_en'),['class'=>"form-control"]) !!}
                        @if ($errors->first('question_description_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('question_description_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('question_description_fr','Question Description (fr)',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::textarea('question_description_fr',old('question_description_fr'),['class'=>"form-control"]) !!}
                        @if ($errors->first('question_description_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('question_description_fr') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('marks_value','Marks Value',['class'=>'col-form-label']) !!}
                        {!! Form::number('marks_value',old('marks_value'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('marks_value'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('marks_value') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('question_type','Question Type',['class'=>'col-form-label']) !!}
                                {!! Form::select('question_type', ['subjective' => 'Subjective', 'objective' => 'Objective'], old('question_type'), ['class'=>'form-control','placeholder'=>'Select Question Type']) !!}
                            </div>
                        </div>
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
        <!-- /.col -->
    </div>
@endsection

@push('scripts')
    <script>
        $(".correct").select2({
            placeholder: "Select Correct Option",
            allowClear: false,
            tags: false
        });
    </script>
@endpush
