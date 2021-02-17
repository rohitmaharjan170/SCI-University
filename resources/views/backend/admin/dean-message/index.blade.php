@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth('admin')->user()->can('gallery-create') OR auth('admin')->user()->is_super)
                        @if($deanMessage->isEmpty())
                            <h5 class="card-title"><a href="{{route('admin.deanmessage.create')}}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i>&nbsp Add Dean Message</a></h5>
                        @endif
                    @endif


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 20%">Name</th>
                            <th style="width: 40%">Post</th>
                            <th style="width: 20%;">Image</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deanMessage as $key => $d)
                            <tr>
                                <td>{{$d->name}}</td>
                                <td>{{$d->post}}</td>
                                <td><img width="100px" src="{{$d->getImagePathAttribute()}}" alt=""></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.deanmessage.show', $d->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
                                            @if(auth('admin')->user()->can('gallery-edit') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.deanmessage.edit', $d->id)}}"><i
                                                            class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
                                            @endif
                                            @if(auth('admin')->user()->can('gallery-delete') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.deanmessage.destroy', $d->id)}}"
                                                   onclick="return confirm('Are you sure?')"><i
                                                            class="fas fa-trash"></i>&nbsp;&nbsp;
                                                    Delete</a>
                                            @endif
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
                        {{$deanMessage->links()}}
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
