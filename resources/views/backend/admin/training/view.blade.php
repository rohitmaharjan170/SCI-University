@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.training.index')}}" class="btn btn-secondary"><i
                                    class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Field</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{$training->title_en}}</td>
                        </tr>
                        <tr>
                            <td>Title (fr)</td>
                            <td>{{$training->title_fr}}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Description (en)</td>
                            <td>{!! $training->description_en !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Description (fr)</td>
                            <td>{!! $training->description_fr !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Short Description (en)</td>
                            <td>{!! $training->short_description_en !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Short Description (fr)</td>
                            <td>{!! $training->short_description_fr !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Price</td>
                            <td>{!! $training->price !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Discount</td>
                            <td>{!! $training->discount !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Rating</td>
                            <td>{!! $training->rating !!}</td>
                        </tr>
                        <tr>
                            <td>Publised Date and Time</td>
                            <td>{{formatDate($training->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>Banner Image</td>
                            <td>
                                <div class="row">
                                    <img src="{{$training->getImagePathAttribute()}}" width="420px" alt="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Video</td>
                            <td>
                                <div class="row">
                                    <iframe width="560" height="315" src="{{$training->video_url}}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sub Banner images</td>
                            <td>
                                <div class="row">
                                    @foreach($training->images as $image)
                                        <div class="col-md-6 mb-2">
                                                <img class="card-img-top" src="{{$image->getImagePathAttribute()}}" width="420px">
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sub Banner Youtube Videos</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($training->videos as $video)
                                            <iframe width="480" height="315" src="{{$video->video_url}}" frameborder="0"
                                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
