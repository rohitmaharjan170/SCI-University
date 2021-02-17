@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth('admin')->user()->can('question-create') OR auth('admin')->user()->is_super)
                        <h5 class="card-title"><a href="{{route('admin.question.create')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp Add Question</a></h5>

                        <div class="float-right">

                            {!! Form::open(['method'=>'GET','route'=>['admin.question.search'],'role'=>'form']) !!}
                            <div class="row">
                                <div class="form-group">
                                    {!! Form::text('question',old('question'),['class'=>"form-control","maxlength"=>"191",'placeholder'=>'search question']) !!}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary ml-1"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('admin.question.index')}}" class="btn btn-info ml-1"><i class="fas fa-sync-alt"></i></a>
                                </div>
                                {!! Form::close() !!}

                            </div>

                        </div>
                    @endif

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">SN</th>
                            <th>Question Title</th>
                            <th>Question Description</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $key => $q)
                            <tr>
                                <td>{{ $questions->firstItem() + $key }}</td>
                                <td>{{$q->question_title_en}}</td>
                                <td>{!! limitString($q->question_description_en) !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.question.show', $q->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
                                            @if(auth('admin')->user()->can('question-edit') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.question.edit', $q->id)}}"><i
                                                            class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</a>
                                            @endif
                                            @if(auth('admin')->user()->can('question-delete') OR auth('admin')->user()->is_super)
                                                <a class="dropdown-item"
                                                   href="{{route('admin.question.destroy', $q->id)}}"
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
                        {{$questions->links()}}
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
