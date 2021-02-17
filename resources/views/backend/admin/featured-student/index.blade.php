@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
{{--                    @if(auth('admin')->user()->can('notice-create') OR auth('admin')->user()->is_super)--}}
                        <h5 class="card-title"><a href="{{route('admin.featuredstudent.create')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp Add Featured Student</a></h5>
{{--                    @endif--}}

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th style="width: 10%">Name</th>
                            <th style="width: 40%">Title</th>
                            <th style="width: 40%;">Short Description</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($featuredStudents as $key => $f)
                            <tr>
                                <td>{{ $featuredStudents->firstItem() + $key }}</td>
                                <td>{{$f->name}}</td>
                                <td>{{$f->title}}</td>
                                <td>{!! limitString($f->description) !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.featuredstudent.show', $f->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
{{--                                            @if(auth('admin')->user()->can('notice-edit') OR auth('admin')->user()->is_super)--}}
                                                <a class="dropdown-item"
                                                   href="{{route('admin.featuredstudent.edit', $f->id)}}"><i
                                                            class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
{{--                                            @endif--}}
{{--                                            @if(auth('admin')->user()->can('notice-delete') OR auth('admin')->user()->is_super)--}}
                                                <a class="dropdown-item"
                                                   href="{{route('admin.featuredstudent.destroy', $f->id)}}"
                                                   onclick="return confirm('Are you sure?')"><i
                                                            class="fas fa-trash"></i>&nbsp;&nbsp;
                                                    Delete</a>
{{--                                            @endif--}}
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
                        {{$featuredStudents->links()}}
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
