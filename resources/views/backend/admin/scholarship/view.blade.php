@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.scholarship.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>{{$scholarship->getFullNameAttribute()}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$scholarship->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$scholarship->phone}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$scholarship->gender}}</td>
                        </tr>
                        <tr>
                            <td>Language</td>
                            <td>{{$scholarship->language}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$scholarship->country}}</td>
                        </tr>
                        <tr>
                            <td>Program</td>
                            <td>{{$scholarship->program->title_en}}</td>
                        </tr>
                        <tr>
                            <td>How did you hear us?</td>
                            <td>{{$scholarship->how_did_you_hear_us}}</td>
                        </tr>
                        <tr>
                            <td>facebook</td>
                            <td>{{$scholarship->facebook}}</td>
                        </tr>
                        <tr>
                            <td>instagram</td>
                            <td>{{$scholarship->instagram}}</td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td>{{$scholarship->twitter}}</td>
                        </tr>
                        <tr>
                            <td>LinkedIn</td>
                            <td>{{$scholarship->instagram}}</td>
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
