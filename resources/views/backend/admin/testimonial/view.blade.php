@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.testimonial.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>{{$testimonial->name}}</td>
                        </tr>
                        <tr>
                            <td>Title (en)</td>
                            <td>{{$testimonial->title_en}}</td>
                        </tr>
                        <tr>
                            <td>Title (fr)</td>
                            <td>{{$testimonial->title_fr}}</td>
                        </tr>
                        <tr>
                            <td>Body (en)</td>
                            <td>{!! $testimonial->body_en !!}</td>
                        </tr>
                        <tr>
                            <td>Body (fr)</td>
                            <td>{!! $testimonial->body_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><div class="row">
                                        <div class="col-md-3">
                                            <img src="{{$testimonial->getImagePathAttribute()}}" width="420px" alt="Bologna">

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
