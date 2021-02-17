@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.notice.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>Title (en)</td>
                            <td>{{$notice->title_en}}</td>
                        </tr>
                        <tr>
                            <td>Title (fr)</td>
                            <td>{{$notice->title_fr}}</td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">Description (en)</td>
                            <td>{!! $notice->description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Description (fr)</td>
                            <td>{!! $notice->description_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Published Date and Time</td>
                            <td>{{formatDate($notice->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{$notice->getImagePathAttribute()}}" width="420px" alt="event">
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
