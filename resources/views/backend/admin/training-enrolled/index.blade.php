@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
{{--                    @if(auth('admin')->user()->can('career-create') OR auth('admin')->user()->is_super)--}}
                        <h5 class="card-title"><a href="{{route('admin.training.index')}}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left"></i>&nbsp Back</a></h5>
{{--                    @endif--}}

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10%">SN</th>
                            <th style="width: 45%">Student Name</th>
                            <th style="width: 45%">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key => $s)
                            <tr>
                                <td>{{ $students->firstItem() + $key }}</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">
                        {{$students->links()}}
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
