@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.question.index')}}" class="btn btn-secondary"><i
                                    class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>Question Title (en)</td>
                            <td>{{$question->question_title_en}}</td>
                        </tr>
                        <tr>
                            <td>Question Title (fr)</td>
                            <td>{{$question->question_title_fr}}</td>
                        </tr>
                        <tr>
                            <td>Description (en)</td>
                            <td>{!! $question->question_description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Description (fr)</td>
                            <td>{!! $question->question_description_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Question Type</td>
                            <td>{{ $question->question_type }}</td>
                        </tr>
                        <tr>
                            <td>Marks Value</td>
                            <td>{!! $question->marks_value !!}</td>
                        </tr>
                        <tr>
                            <td>Options</td>
                            <td>
                                <ul>
                                    @foreach($question->options as $key => $option)
                                        <li>
                                            {{$option->option}}
                                            @if($option->correct)
                                                <span class="badge badge-success">Correct Answer</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
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
