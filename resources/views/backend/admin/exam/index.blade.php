@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth('admin')->user()->can('exam-create') OR auth('admin')->user()->is_super)
                        <h5 class="card-title"><a href="{{route('admin.exam.create')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp Add Exam</a></h5>
                    @endif

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Course</th>
                            <th>Training</th>
                            <th>Exam Title</th>
                            <th>Exam Description</th>
                            <th>Total Marks</th>
                            <th>Time Duration</th>
                            <th>Total Subjective Marks</th>
                            <th>Total Objective Marks</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exam as $key => $e)
                            <tr>
                                <td>{{ $exam->firstItem() + $key }}</td>
                                <td>{{$e->course->title_en ?? null}}</td>
                                <td>{{$e->training->title_en ?? null}}</td>
                                <td>{{$e->exam_title_en}}</td>
                                <td>{!! limitString($e->exam_description_en) !!}</td>
                                <td>{{$e->total_marks}}</td>
                                <td>{{$e->time_duration}}</td>
                                <td>{{$e->total_subjective_question}}</td>
                                <td>{{$e->total_objective_question}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.exam.show', $e->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
                                            @if(auth('admin')->user()->can('exam-edit') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.exam.edit', $e->id)}}"><i
                                                            class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
                                            @endif
                                            @if(auth('admin')->user()->can('exam-delete') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.exam.destroy', $e->id)}}"
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
                        {{$exam->links()}}
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
