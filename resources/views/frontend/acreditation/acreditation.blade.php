@extends('frontend.layouts.app')
@section('content')
<section class="partners-section bg-off-white section-paddings bg-off-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['method'=>'POST','route'=>['scholarship.apply'],'class'=>'bg-white shadow p-3 contact-form','role'=>'form','enctype' => 'multipart/form-data']) !!}
                        <h3 class="mini-head text-center mb-3">{{__('text.apply_for_scholarship')}}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" required="" maxlength="191"
                                           placeholder="{{__('text.first_name')}}" name="first_name" type="text">
                                    @if ($errors->first('first_name'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" required="required" maxlength="191"
                                           placeholder="{{__('text.last_name')}}" name="last_name" type="text">
                                    @if ($errors->first('last_name'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" required="required" maxlength="191"
                                           placeholder="{{__('text.country')}}" name="country" type="text">
                                    @if ($errors->first('country'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" required="required" maxlength="191"
                                           placeholder="{{__('text.city')}}" name="city" type="text">
                                    @if ($errors->first('city'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                         
  <div class="col-md-12">

<div class="form-group">
                              
                                    <label for="gender" class= "col-form-label" style="font-size: 16px;margin-right: 10px;">{{ __('Gender') }}</label>
                            <div class="form-check form-check-inline" >
                                <input id="male" class="form-check-input" type="radio" name="gender" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="female" class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                                </div>
                        </div>


  <div class="col-md-12">

<div class="form-group">
                              
                                    <label for="language" class= "col-form-label" style="font-size: 16px;margin-right: 10px;">{{ __('Language') }}</label>
                            <div class="form-check form-check-inline" >
                                <input id="english" class="form-check-input" type="radio" name="language" value="english">
                                <label class="form-check-label" for="english">English</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="french" class="form-check-input" type="radio" name="language" value="french">
                                <label class="form-check-label" for="french">French</label>
                            </div>
                                </div>
                        </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" required="required" maxlength="191"
                                           placeholder="{{__('text.phone')}}" name="phone" type="number">
                                    @if ($errors->first('phone'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" required="required" placeholder="{{__('text.email')}}"
                                           name="email" type="text">
                                    @if ($errors->first('email'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    <!-- <div class="form-group">
                            <input class="form-control" maxlength="191" placeholder="{{__('text.specialisation')}}"
                                   name="specialisation" type="text">
                        </div> -->

   <div class="form-group">
                            <div class="row">
                                <div class="col-md-6" style="font-size: 16px">
                                    {!!Form::label('program',__('text.choose_a_program'),['class'=>'col-form-label']) !!}
                                    {!! Form::select('program',$programs, old('program'), ['class'=>'form-control','placeholder'=>'Choose']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6" style="font-size: 16px">
                                    {!!Form::label('how_did_you_hear_us',__('text.how_did_you_hear_us'),['class'=>'col-form-label']) !!}
                                    {!! Form::select('how_did_you_hear_us',['friends'=>'Friends','web'=>'Web','facebook' => 'Facebook', 'instagram' => 'Instagram', 'twitter' => 'Twitter', 'linkedin' => 'LinkedIn'], old('how_did_you_hear_us'), ['class'=>'form-control','placeholder'=>'Choose']) !!}
                                </div>
                            </div>
                        </div>
                           <div class="form-group">
                                <div class="row">
                                     <div class="col-md-6" style="font-size: 16px">
                                       {!!Form::label('How_do_you_learn_about_our_Program',__('text.How_do_you_learn_about_our_Program'),['class'=>'col-form-label']) !!}
                                
                                    <input class="form-control" required="required" placeholder="{{__('text.How_do_you_learn_about_our_Program')}}"
                                           name="email" type="text">
                                    @if ($errors->first('How_do_you_learn_about_our_Program'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('How_do_you_learn_about_our_Program') }}</strong>
                                    </span>
                                    @endif
                                      </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="row" style="font-size: 16px">
                                {!!Form::label('resume',__('text.cv_or_resume'),['class'=>'col-form-label col-lg-2']) !!}
                                <div class="col-md-4 upload">
                                    <div>
                                        {!! Form::file('resume') !!}
                                    </div>
                                    @if ($errors->first('resume'))
                                        <span class="text-danger">
                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
       <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-success p-t-0">
                                            <input id="checkbox-signup" type="checkbox"
                                                   class="filled-in chk-col-light-blue" style="height:10px;">
                                           I am aware and agree that by subscribing my personal data will be used according to the  SCI Education USA University  <a href="/terms-and-conditions" target="blank"> Terms and Conditions of Use*</a> and Data Protection and <a href="/privacy-policy" target="blank"> Privacy Policy*</a> and be subject thereto. 
                                        
                                        </div>
                                    </div>
                                </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-rounded">{{__('text.submit')}}</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                  


                
                </div>

            </div>
        </section>
@endsection