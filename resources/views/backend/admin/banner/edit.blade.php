@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.banner.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($banner,['method'=>'PUT','route'=>['admin.banner.update',$banner->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {!!Form::label('title_en','Banner Title (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('title_en',$value=null,['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('title_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('title_fr','Banner Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('title_fr',$value=null,['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('title_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('title_fr') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_en','Banner Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_en',$value=null,['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_fr','Banner Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_fr',$value=null,['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::radio('upload_type', 'by_image' , false) }}
                        {!!Form::label('upload_type','Upload Image',['class'=>'col-form-label mr-4']) !!}
                        {{ Form::radio('upload_type', 'by_youtube' , false) }}
                        {!!Form::label('video','Upload From Youtube URL',['class'=>'col-form-label']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('image','Upload Content',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div class="videoUrlForm">

                                    @if($banner->video_url)
                                        {!! Form::text('video_url',$value=null,['class'=>"form-control",'required'=>'required']) !!}
                                    @else
                                        {!! Form::file('image') !!}
                                    @endif

                                </div>
                                
<span style="color:#007bff;margin-top: 10px;">* The optimal banner size is (width= 1903px , height= 577px)</span>
                            </div>
                        </div>
                    </div>

                    <!-- check if its youtube video url then display youtube video else display banner image -->
                    @if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $banner->video_url, $match))
                        <iframe width="560" height="315" src="{{$banner->video_url}}" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    @else
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$banner->getImagePathAttribute()}}" alt="Bologna">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

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
        $("[name='upload_type']").on('click', function () {
            let uploadType = $("[name='upload_type']:checked").val();

            if (uploadType === 'by_image') {
                let form = '<input required="" name="image" type="file" id="image">';
                $('.videoUrlForm').html(form);
            }
            if (uploadType === 'by_youtube') {
                let form = '<input class="form-control" required="required" name="video_url" type="text" id="url">';
                $('.videoUrlForm').html(form);
            }
        });
    </script>
@endpush