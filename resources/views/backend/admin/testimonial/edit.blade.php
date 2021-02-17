@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.testimonial.index')}}"
                                              class="btn btn-secondary"><b><i
                                    class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($testimonial,['method'=>'PUT','route'=>['admin.testimonial.update',$testimonial->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {!!Form::label('name','Name',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('name',$value=null,['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_en','Title (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_en',$value=null,['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_fr','Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_fr',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('body_en','Body (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::textarea('body_en',$value=null,['class'=>"form-control",'required'=>'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('body_fr','Body (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::textarea('body_fr',$value=null,['class'=>"form-control"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('image','Image',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div>
                                    {!! Form::file('image') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                                <div class="col-md-3">
                                    <img src="{{$testimonial->getImagePathAttribute()}}" width="420" alt="Bologna">
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
