@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth('admin')->user()->can('gallery-create') OR auth('admin')->user()->is_super)
                        <h5 class="card-title"><a href="{{route('admin.gallery.create')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp Add Gallery</a></h5>
                    @endif


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10%">SN</th>
                            <th style="width: 40%">Title</th>
                            <th style="width: 40%;">Description</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gallery as $key => $g)
                            <tr>
                                <td>{{ $gallery->firstItem() + $key }}</td>
                                <td>{{$g->title_en}}</td>
                                <td>{!! limitString($g->description_en) !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.gallery.show', $g->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
                                            @if(auth('admin')->user()->can('gallery-edit') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.gallery.edit', $g->id)}}"><i
                                                            class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
                                            @endif
                                            @if(auth('admin')->user()->can('gallery-delete') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.gallery.destroy', $g->id)}}"
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
                        {{$gallery->links()}}
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
