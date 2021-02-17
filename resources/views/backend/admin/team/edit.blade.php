@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.team.index')}}"
                                              class="btn btn-secondary"><b><i
                                    class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($team,['method'=>'PUT','route'=>['admin.team.update',$team->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {!!Form::label('name','Name',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::text('name',$value=null,['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('designation','Designation',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('designation',$value=null,['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('details_en','Details (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('details_en',$value=null,['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('details_fr','Details (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('details_fr',$value=null,['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('facebook','Facebook',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('facebook',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('instagram','Instagram',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('instagram',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('twitter','Twitter',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('twitter',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('linkedin','LinkedIn',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('linkedin',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                                <div class="col-md-3">
                                    <img src="{{$team->getImagePathAttribute()}}" width="420" alt="Bologna">

                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('image','Image',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div>
                                    {!! Form::file('image',$attributes = ['accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                </div>
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
