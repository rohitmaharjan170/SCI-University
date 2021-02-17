@extends('frontend.student.layouts.app')

@section('content')
    <style>
        span, label {
            font-family: Arial;
            font-weight: normal !important;
        }

        input[type=radio] {
            width: 15px;
            height: 15px;
        }

        div.sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            font-size: 20px;
        }
    </style>

    <div id="exam_container" class="row">
        <div class="col-md-8">
            {!! Form::open(['id'=>'exam_form','method'=>'POST','route'=>['student.test.submit'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="exam_id" value="{{$exam->id}}">
            <input type="hidden" name="total_questions" value="{{$totalQuestions}}">
            @foreach($questions as $key=>$question)

                <div class="card">
                    <div class="card-header"><span
                                style="font-size: 17px"><strong>{{ $key+1 }}. {{$question->question_title_en}}</strong></span>
                    </div>
                    <div class="card-body">
                        <ul style="list-style-type:none;" class="list-group">
                            @foreach($question->options as $option)
                                <label>
                                    <li class="list-group-item">
                                        <input id="option{{$option->id}}" type="radio"
                                               class="mr-2 question{{$question->id}}"
                                               data-question="question{{$question->id}}"
                                               data-option="option{{$option->id}}"
                                               name="student_answer[{{ $key }}][option_id]"
                                               value="{{$option->id}}">
                                        {{$option->option}}
                                        <input type="hidden"
                                               name="student_answer[{{ $key }}][question_id]"
                                               value="{{$question->id}}">
                                    </li>
                                </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach


            <div class="form-group float-right">
                <button type="submit" onclick="return confirm('do you want to submit your exam?');"
                        class="btn btn-primary">
                    Submit
                </button>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-4">
            <div class="sticky">
                <div class="card">
                    <div class="card-header"><span class="text-secondary">Time Remaining</span></div>
                    <div class="card-body">
                        <div id="DateCountdown" data-date=""
                             style="width: 100%;"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><span class="text-secondary">Student Details</span></div>
                    <div class="card-body">
                        <table class="table table-bordered sticky">
                            <tr>
                                <th><label>Name</label></th>
                                <td>{{$student->name}}</td>
                            </tr>
                            <tr>
                                <th><label>Email</label></th>
                                <td>{{$student->email}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        //disable the right click and keyboard
        $(document).keydown(function(event) {
            return false;
        });

        $(document).bind("contextmenu",function(e){
            return false;
        });

        let endTime = '{{$endTime}}';
        //set clock end timer
        $("#DateCountdown").data('date', endTime);

        $("#DateCountdown").TimeCircles({
            "time": {
                "Days": {
                    "text": "Days",
                    "color": "#FFCC66",
                    "show": false
                },
                "Hours": {
                    "text": "Hours",
                    "color": "#99CCFF",
                    "show": true,
                },
                "Minutes": {
                    "text": "Minutes",
                    "color": "#BBFFBB",
                    "show": true
                },
                "Seconds": {
                    "text": "Seconds",
                    "color": "#FF9999",
                    "show": true
                }
            }
        });

        setInterval(function () {
            let remainingSecond = $('#DateCountdown').TimeCircles().getTime();

            if (parseInt(remainingSecond) === 0) {
                alert('exam time over');
                $("#exam_form").submit();
            }
        }, 1000);

        // console.log(Object.entries(localStorage));
        let options = Object.entries(localStorage);
        // console.log(options);
        $('input[type=radio]').change(function () {
            let question = $(this).data('question');
            let option = $(this).data('option');
            //remove old question group option
            localStorage.removeItem(question);
            //set option as true
            localStorage.setItem(question, option);
        });

        //sets stored radio buttons
        for (var i = 0, len = localStorage.length; i < len; ++i) {
            // console.log( localStorage.getItem( localStorage.key( i ) ) );
            let checked = localStorage.getItem(localStorage.key(i));
            // console.log(localStorage.getItem(localStorage.key( i )));
            $('#' + checked).attr('checked', localStorage.getItem(localStorage.key(i)));
        }

        {{--$('.pagination a').click(function (e) {--}}
        {{--    // e.preventDefault();--}}
        {{--    var formData = $('#exam_form').serialize();--}}
        {{--    console.log(formData);--}}
        {{--    --}}{{--$.ajax({--}}
        {{--    --}}{{--    type: 'GET',--}}
        {{--    --}}{{--    url: '{{route('student.start.test')}}',--}}
        {{--    --}}{{--    data: formData,--}}
        {{--    --}}{{--    success: function (data) {--}}
        {{--    --}}{{--        --}}
        {{--    --}}{{--    }--}}
        {{--    --}}{{--})--}}
        {{--});--}}
    </script>
@endpush