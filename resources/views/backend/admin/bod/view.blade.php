@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.bod.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>{{$bod->name}}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>{{$bod->designation}}</td>
                        </tr>
                        <tr>
                            <td>Short Description (en)</td>
                            <td>{!! $bod->short_description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Short Description (fr)</td>
                            <td>{!! $bod->short_description_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><div class="row">
                                        <div class="col-md-3">
                                            <img src="{{$bod->getImagePathAttribute()}}" width="420px" alt="Bologna">

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
