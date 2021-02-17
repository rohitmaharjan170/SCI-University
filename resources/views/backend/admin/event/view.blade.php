@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.press.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>{{$event->title_en}}</td>
                        </tr>
                        <tr>
                            <td>Title (fr)</td>
                            <td>{{$event->title_fr}}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Description</td>
                            <td>{!! $event->description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Description (fr)</td>
                            <td>{!! $event->description_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Published Date and Time</td>
                            <td>{{formatDate($event->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{$event->getImagePathAttribute()}}" width="420px" alt="event">
                                            </div>
                                        </div>
                                </div></td>
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
