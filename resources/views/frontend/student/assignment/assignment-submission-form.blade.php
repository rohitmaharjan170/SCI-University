@extends('frontend.student.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><a href="{{route('student.submit.assignments.index',$courseId)}}"
                                      class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a ></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['method'=>'POST','route'=>['student.submit.assignment'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="course_id" value="{{$courseId}}">
            <input type="hidden" name="assignment_id" value="{{$assignmentId}}">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('title','Title',['class'=>'col-form-label col-lg-12']) !!}
                            {!! Form::text('title',old('title'),['class'=>"form-control",'required',"maxlength"=>"191",'placeholder'=>'enter title']) !!}
                            @if ($errors->first('title'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('description','Description',['class'=>'col-form-label col-lg-12']) !!}
                            {!! Form::textarea('description',old('description'),['class'=>"form-control",'required'=>'required']) !!}
                            @if ($errors->first('description'))
                                <span class="text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Upload File</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                @if ($errors->first('assignments'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('assignments') }}</strong>
                                    </span>
                                @endif
                                <div class="custom-file">
                                    <input type="file" id="customFile" name="assignments[0][assignment]" required>
                                </div>
                            </td>
                            <td class="text-center">
                                <i class="fas fa-plus-square text-success fa-2x" data-table=""
                                   onclick="addRow(this)"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    <script>
        let i = 1;

        function addRow(ctrl) {
            let td;
            td = '<tr>\n' +
                '                      <td>\n' +
                '                            <div class="custom-file">\n' +
                '                                <input type="file" id="customFile" name="assignments[' + i + '][assignment]">\n' +
                '                                                            </div>\n' +
                '                        </td>\n' +
                '                        <td class="text-center">\n' +
                '                            <i class="fas fa-plus-square text-success fa-2x" data-table="" onclick="addRow(this)"></i>\n' +
                '                            <i class="fas fa-minus-square text-danger fa-2x" onclick="deleteRow(this)"></i>\n' +
                '                        </td>\n' +
                '                    </tr>';
            $('table > tbody').append(td);
            i++;
        }

        function deleteRow(ctrl) {
            $(ctrl).parent().parent().remove();
        }
    </script>
@endpush