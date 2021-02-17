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
                    {!! Form::open(['method'=>'GET','route'=>['student.start.test'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('exam_id','Exam',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::select('exam_id', $exam, old('exam_id'), ['class'=>'form-control exam_list','placeholder'=>'Select']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Exam Title</th>
                                        <th>Exam Description</th>
                                        <th>Total Marks</th>
                                        <th>Time Duration (min)</th>
                                    </tr>
                                    </thead>
                                    <tbody class="exam_details">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Start Test</button>
                    </div>

                    {!! Form::close() !!}
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

@push('scripts')
    <script>
        window.localStorage.clear();
        $(document).ready(function () {
            let exam_id;
            $('.exam_list').change(function () {
                exam_id = $('.exam_list').val();
                if (exam_id !== '') {
                    $.ajax({
                        url: '{{route('student.exam.details')}}',
                        method: 'GET',
                        data: {
                            exam_id: exam_id,
                        },
                        success: function (response) {
                            let examDetails = '<tr> \n';
                            $.each(response, function (key, value) {
                                examDetails += '<td>'+value+'</td> \n';
                            });
                            examDetails += '</td>';
                            // console.log(examDetails);
                            $('.exam_details').html(examDetails);
                        }
                    });
                }else{
                    $('.exam_details').html('');
                }
            });
        });
    </script>
@endpush

