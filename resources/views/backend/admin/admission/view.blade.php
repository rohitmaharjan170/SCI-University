@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.admission.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>{{$admission->getFullNameAttribute()}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$admission->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$admission->phone}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$admission->country}}</td>
                        </tr>
                        <tr>
                            <td>Program</td>
                            <td>{{$admission->program->title_en}}</td>
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
