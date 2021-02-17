@extends('frontend.student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h5 class="card-title">Recent Career</h5>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Posted On</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($career as $key => $c)
                            <tr>
                                <td>{{ $career->firstItem() + $key }}</td>
                                <td>{{$c->title_en}}</td>
                                <td>{!! $c->description_en !!}</td>
                                <td>{{formatDate($c->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">
                        {{$career->links()}}
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
