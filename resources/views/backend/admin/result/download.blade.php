<html>
<head>
    <style>
        ul {
            list-style-type: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css')}}">
</head>
<body>
<div class="container-fluid">
    <table class="table table-bordered table-striped my-4">
        <tbody>
        <tr>
            <th>Student Name</th>
            <td>{{$result->student->name}}</td>
        </tr>
        <tr>
            <th>Exam</th>
            <td>{{$result->exam->exam_title_en}}</td>
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
</body>
</html>