@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.exam.index')}}" class="btn btn-secondary"><i
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
                            <td>Exam Title (en)</td>
                            <td>{{$exam->exam_title_en}}</td>
                        </tr>
                        <tr>
                            <td>Exam Title (fr)</td>
                            <td>{{$exam->exam_title_fr}}</td>
                        </tr>
                        <tr>
                            <td>Exam Description (en)</td>
                            <td>{!! $exam->exam_description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Exam Description (fr)</td>
                            <td>{!! $exam->exam_description_fr !!}</td>
                        </tr>
                        <tr>
                            <td>Course</td>
                            <td>{{$exam->course->title_en}}</td>
                        </tr>
                        <tr>
                            <td>Total Marks</td>
                            <td>{{$exam->total_marks}}</td>
                        </tr>
                        <tr>
                            <td>Time Duration</td>
                            <td>{{$exam->time_duration}} minutes</td>
                        </tr>
                        <tr>
                            <td>Total Subjective Question</td>
                            <td>{{$exam->total_subjective_question}}</td>
                        </tr>
                        <tr>
                            <td>Total Objective Question</td>
                            <td>{{$exam->total_objective_question}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if($exam->status)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Not Active</span>
                                @endif
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
