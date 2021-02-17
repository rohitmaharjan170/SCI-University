@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.video.index')}}" class="btn btn-secondary"><i
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
                            <td>{{$video->title_en}}</td>
                        </tr>
                        <tr>
                            <td>Title (fr)</td>
                            <td>{{$video->title_fr}}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Description</td>
                            <td>{!! $video->description !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Description (fr)</td>
                            <td>{!! $video->description_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Publised Date and Time</td>
                            <td>{{formatDate($video->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>Video</td>
                            <td>
                                <div class="row">
                                    <iframe width="560" height="315" src="{{$video->url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
