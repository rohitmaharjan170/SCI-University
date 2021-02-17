@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.video.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($video,['method'=>'PUT','route'=>['admin.video.update',$video->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_en','Title (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_en',old('title_en'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_fr','Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_fr',old('title_fr'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('description','Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description',old('description_en'),['class'=>"form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_fr','Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_fr',old('description_fr'),['class'=>"form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('show_in_homepage','Show In Homepage',['class'=>'col-form-label col-lg-2']) !!}
                        {!! Form::select('show_in_homepage', ['1' => 'Yes', '0' => 'No'], old('show_in_homepage'), ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('url','Youtube Video URL',['class'=>'col-form-label']) !!}
                        {!! Form::text('url',old('url'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            @if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $video->url, $match))

                                <iframe width="560" height="315" src="{{$video->url}}" frameborder="0"
                                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            @else
                                <div class="col-md-12">
                                    <p>no preview available</p>
                                </div>
                            @endif

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
        $("[name='upload_type']").on('click', function () {
            let uploadType = $("[name='upload_type']:checked").val();

            if (uploadType === 'by_video') {
                let form = '<input required="" name="video" type="file" id="video">';
                $('.videoUrlForm').html(form);
            }
            if (uploadType === 'by_url') {
                let form = '<input class="form-control" required="required" name="videoUrl" type="text" id="url">';
                $('.videoUrlForm').html(form);
            }
        });
    </script>
@endpush
