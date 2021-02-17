@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{$title ?? null}}</h5>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($siteSettings,['method'=>'PUT','route'=>['admin.sitesettings.update',1],'role'=>'form','enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {!!Form::label('website_name','Website Name',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('website_name',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('welcome_message_en','Welcome Message (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('welcome_message_en',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('welcome_message_fr','Welcome Message (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('welcome_message_fr',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>

                    <div class="form-group">
                        {!!Form::label('primary_email','Primary Email',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('primary_email',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('primary_email'))
                            <span class="text-danger">{{$errors->first('primary_email')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!!Form::label('primary_address','Primary Address',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('primary_address',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('primary_mobile','Primary Mobile',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::number('primary_mobile',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('primary_mobile'))
                            <span class="text-danger">{{$errors->first('primary_mobile')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!!Form::label('contact_address','Contact Address',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('contact_address',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('contact_hotline','Contact Hotline',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::number('contact_hotline',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('contact_hotline'))
                            <span class="text-danger">{{$errors->first('contact_hotline')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('contact_mobile','Contact Mobile',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::number('contact_mobile',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('contact_mobile'))
                            <span class="text-danger">{{$errors->first('contact_mobile')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('contact_company','Contact Company',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('contact_company',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('contact_jobseeker','Contact Jobseeker',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::number('contact_jobseeker',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('contact_jobseeker'))
                            <span class="text-danger">{{$errors->first('contact_jobseeker')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('contact_url','Contact URL',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('contact_url',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('contact_url'))
                            <span class="text-danger">{{$errors->first('contact_url')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('facebook','Facebook',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('facebook',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('facebook'))
                            <span class="text-danger">{{$errors->first('facebook')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('instagram','Instagram',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('instagram',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('instagram'))
                            <span class="text-danger">{{$errors->first('instagram')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('twitter','Twitter',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('twitter',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('twitter'))
                            <span class="text-danger">{{$errors->first('twitter')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('linkedin','LinkedIn',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('linkedin',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                        @if($errors->first('linkedin'))
                            <span class="text-danger">{{$errors->first('linkedin')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('pinterest','Pinterest',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('pinterest',$value=null,['class'=>"form-control"]) !!}
                        @if($errors->first('pinterest'))
                            <span class="text-danger">{{$errors->first('pinterest')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('latitude','Latitude',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('latitude',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('longitude','Longitude',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('longitude',$value=null,['class'=>"form-control","maxlength"=>"191"]) !!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Settings</button>
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
