@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.event.create')}}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i>&nbsp Add Event</a></h5>


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
                        @foreach($event as $key => $e)
                            <tr>
                                <td>{{ $event->firstItem() + $key }}</td>
                                <td>{{$e->title_en}}</td>
                                <td>{!! limitString($e->description_en) !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.event.show', $e->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
                                            <a class="dropdown-item"
                                               href="{{route('admin.event.edit', $e->id)}}"><i
                                                        class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
                                            <a class="dropdown-item"
                                               href="{{route('admin.event.destroy', $e->id)}}"
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
                        {{$event->links()}}
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
