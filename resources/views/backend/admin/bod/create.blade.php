@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.bod.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::open(['method'=>'POST','route'=>['admin.bod.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!!Form::label('name','Name',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('name',old('name'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('designation','Designation',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('designation',old('designation'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('short_description_en','Short Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('short_description_en',old('short_description_en'),['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('short_description_fr','Short Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('short_description_fr',old('short_description_fr'),['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('cover_image','Image',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div>
                                    {!! Form::file('image',$attributes = ['accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                </div>
                                @if($errors->first('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        {!! Form::radio('faculty', 'bod', true) !!}
                        {!!Form::label('faculty','Board of Directors',['class'=>'col-form-label mr-4']) !!}
                        {!! Form::radio('faculty', 'resident') !!}
                        {!!Form::label('faculty','Resident Professor',['class'=>'col-form-label mr-4']) !!}
                        {!! Form::radio('faculty', 'visiting') !!}
                        {!!Form::label('faculty','Visiting Professor',['class'=>'col-form-label mr-4']) !!}
                        {!! Form::radio('faculty', 'consultant') !!}
                        {!!Form::label('faculty','Consultant',['class'=>'col-form-label mr-4']) !!}
                        {!! Form::radio('faculty', 'instructor') !!}
                        {!!Form::label('faculty','Instructor',['class'=>'col-form-label mr-4']) !!}
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
