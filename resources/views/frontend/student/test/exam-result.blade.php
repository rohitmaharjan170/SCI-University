@extends('frontend.student.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Choose Program</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Correct Answer</th>
                            <th>Total Question</th>
                            <th>Total Marks Obtained</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{$result->exam['exam_title_en'] ?? null}}</td>
                                <td>{{$result->correct_answers}}</td>
                                <td>{{$result->questions_count}}</td>
                                <td>{{$result->total_marks_obtained}}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{route('student.test.result', ['result_id'=>encrypt($result->id)])}}"><i
                                                class="fas fa-eye"></i>&nbsp;&nbsp;View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$results->links()}}
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


