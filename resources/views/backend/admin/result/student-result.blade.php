@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><a href="{{route('admin.result.index')}}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left"></i>&nbsp Back</a></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th style="width: 10px">SN</th>
                    <th>Exam</th>
                    <th>Correct Answers</th>
                    <th>Total Questions</th>
                    <th>Total Marks Obtained</th>
                    <th>Submission Date & Time</th>
                    <th style="width: 20px;">View Answer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $key => $r)
                    <tr>
                        <td>{{ $results->firstItem() + $key }}</td>
                        <td>
                            {{$r->exam['exam_title_en']}}
                        </td>
                        <td>
                            {{$r->correct_answers}}
                        </td>
                        <td>
                            {{$r->questions_count}}
                        </td>
                        <td>
                            {{$r->total_marks_obtained}}
                        </td>
                        <td>{{$r->created_at}}</td>
                        <td>

                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Choose
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                       href="{{route('admin.result.student.show.answer',$r->id)}}"><i
                                                class="fas fa-eye pr-2"></i>View Answer</a>
                                    <a class="dropdown-item" href="{{route('admin.result.download',$r->id)}}"><i class="fas fa-download pr-2"></i>Download</a>

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
                {{$results->links()}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-footer -->
    </div>

@endsection
