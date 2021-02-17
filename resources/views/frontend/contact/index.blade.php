@extends('frontend.layouts.app')

@section('content')
    <!--body wrapper starts here-->
    <section class="body-wrapper ">
        <!--contact info-->
        <section class="contact-info bg-off-white section-paddings">
            <div class="container" style="text-align: center;">
                <div class="row" style="display: inline-block;">
                    <div class="col-md-6" style="display: inline-block;    float: left;">
                        <div class="contact-box text-center  ">
                            <button class="btn btn-warning">United States of America (USA)</button>
                            <div class="icon" style="padding-top: 15px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <p>New Heaven, Connecticut</p>

                         

                            <div class="icon" style="padding-top: 15px;">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <p><a href="mailto:info@scieducation.org"> info@scieducation.org</a></p>
                        </div>
                    </div>
                    <div class="col-md-6"  style="display: inline-block;    float: left;">
                        <div class="contact-box text-center  ">
                            <button class="btn btn-warning">African Office</button>
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <p>Abidjan – Cote d’ivoire</p>

                        

                            <div class="icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <p><a href="mailto:info@scieducation.org">info@scieducation.org</a></p>

                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <p>+225 22 49 72 15</p>
                        </div>
                    </div>
                 <?php /*   <div class="col-md-4">
                        <div class="contact-box text-center  ">
                            <button class="btn btn-warning">NEWYORK</button>
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <p>Itahari, Sunsari, Nepal</p>

                          
                            <div class="icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <p><a href="mailto:info@yoursite.com"> info@lyceexmail.com</a></p>
                        </div>
                    </div> */?>
                </div>
            </div>
        </section>
        <!--contact info-->

        <!--Contact form starts here-->
        <section class="ContactForm bg-white section-paddings">
            <div class="container">
                <div class="row  ">
                    <div class="col-md-6">
                        <h2 class="text-left  m-t-40 m-b-40">{{__('text.have_any_question_feel_free_to_contact')}}</h2>
                        <h6>{{__('text.contact_us_and_we_will_get_back')}}</h6>
                        <p>{{__('text.contact_us_body')}}
                        </p>
                        <div class="social">
<img src="https://img.icons8.com/color/48/000000/facebook.png"/>           
<img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/>                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <form action={{route('contact.store')}} method='POST' class="bg-light shadow p-20">
                            {{csrf_field()}}
                            <h4 class="mini-head text-center">Contact us</h4>
                            <p>Please enter the required information below to immediately apply to a program.
An admission advisor will contact you to help with the process.
</p>
                            <div class="form-group">
                                <input type="text" maxlength="191" value="{{old('name')}}"
                                       class="form-control {{$errors->first('name') ? 'border-danger':''}}" name="name"
                                       placeholder="{{__('text.name')}}" required>
                                @if ($errors->first('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('Name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" value="{{old('email')}}" class="form-control {{$errors->first('email') ? 'border-danger':''}}" name="email" placeholder="{{__('text.email')}}" required>
                                @if ($errors->first('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" maxlength="191" class="form-control {{$errors->first('subject') ? 'border-danger':''}}" name="subject"
                                       placeholder="{{__('text.subject')}}">
                                @if ($errors->first('subject'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="7" maxlength="2000" class="form-control {{$errors->first('subject') ? 'border-danger':''}}"
                                          name="message"
                                          placeholder="{{__('text.message')}}" required></textarea>
                                @if ($errors->first('message'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input style="padding:0.5rem 0.8rem !important;" type="submit" value="{{__('text.send_message')}}" class="btn btn-warning py-3 px-5">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!--Contact form ends here-->

        <!--Contact maps starts here-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12301.513435481704!2d-96.04069516490034!3d39.57362236133188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87be3e79433f6007%3A0x86baec447b34422!2sAmerica%20City%2C%20KS%2066540%2C%20USA!5e0!3m2!1sen!2snp!4v1594798997246!5m2!1sen!2snp"
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        <!--Contact maps ends here-->
    </section>
@endsection