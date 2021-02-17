@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.manage.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp Add Admin</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $key => $a)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$a->name}}</td>
                                <td>{{$a->email}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.manage.edit', $a->id)}}"><i
                                                    class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
                                            <a class="dropdown-item"
                                               href="{{route('admin.manage.destroy', $a->id)}}"
                                               onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i>&nbsp;&nbsp;
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">
                        {{$admins->links()}}
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
