@extends('backend.layouts.app')
@section('content')
    <style>
        ul {
            list-style-type: none;
        }
    </style>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><a href="{{url()->previous()}}" class="btn btn-secondary mb-3 mr-3"><i
                            class="fas fa-arrow-left"></i>&nbsp Back</a>
                <a href="{{route('admin.result.download',$result->id)}}" class="btn btn-success float-right"><i class="fas fa-download pr-2"></i>Download</a>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>Student Name</th>
                    <td>{{$result->student->name}}</td>
                </tr>
                <tr>
                    <th>Exam Submission Date</th>
                    <td>{{formatDate($result->created_at)}}</td>
                </tr>
                <tr>
                    <th>Marks Obtained</th>
                    <td>
                        @if($result->total_marks_obtained > 0)
                            {{$result->total_marks_obtained}}
                        @else
                            <span class="text-danger">{{$result->total_marks_obtained}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Total Correct Questions</th>
                    <td>{{$result->correct_answers.'/'.$result->questions_count}}</td>
                </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                @foreach($result->exam->questionsWithOptions as $key => $question)
                    <tr>
                        <th>Question #{{$key+1}}</th>
                        <th>{{$question->question_title_en}}</th>
                    </tr>
                    <tr>
                        <th>Options</th>
                        <td>
                            <ul>
                                @foreach($question->options as $option)
                                    <li>
                                        {{$option->option}}
                                        @if($option->correct)
                                            <em><span class="badge badge-success ">Correct Answer</span></em>
                                            @foreach($result->studentOptions as $studentOption)
                                                @if($option->id == $studentOption->option_id)
                                                    <em><span class="badge badge-info ">Your Answer</span></em>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($result->studentOptions as $studentOption)
                                                @if($option->id == $studentOption->option_id)
                                                    <em><span class="badge badge-danger ">Your Answer</span></em>
                                                @endif
                                            @endforeach
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
@endsection