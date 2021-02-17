@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.team.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>Name</td>
                            <td>{{$team->name}}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>{{$team->designation}}</td>
                        </tr>
                        <tr>
                            <td>Details (en)</td>
                            <td>{!! $team->details_en !!}</td>
                        </tr>
                        <tr>
                            <td>Details (fr)</td>
                            <td>{!! $team->details_fr !!}</td>
                        </tr>
                        <tr>
                            <td>facebook</td>
                            <td>{{$team->facebook}}</td>
                        </tr>
                        <tr>
                            <td>instagram</td>
                            <td>{{$team->instagram}}</td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td>{{$team->twitter}}</td>
                        </tr>
                        <tr>
                            <td>LinkedIn</td>
                            <td>{{$team->linkedin}}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><div class="row">
                                        <div class="col-md-3">
                                            <img src="{{$team->getImagePathAttribute()}}" width="420px" alt="Bologna">

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
