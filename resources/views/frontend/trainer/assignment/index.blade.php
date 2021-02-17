@extends('frontend.trainer.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><a href="{{route('trainer.course.actions',[$courseId,'course-menu'])}}"
                                      class="btn btn-secondary"><b><i
                                class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a ></h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['method'=>'POST','route'=>['trainer.upload.assignment'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="course_id" value="{{$courseId}}">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('title','Title',['class'=>'col-form-label col-lg-12']) !!}
                            {!! Form::text('title',old('title'),['class'=>"form-control",'required',"maxlength"=>"191"]) !!}
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

                <fieldset>
                    <legend>Student List:</legend>
                    <div class="form-group">
                        <label for="checkbox">Select All</label>
                        <input type="checkbox" id="checkAll">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            @foreach($students->chunk(4) as $student)
                                <div class="col-md-3">
                                    @foreach($student as $s)
                                        <ul style="list-style-type:none;">
                                            <li>
                                                {!! Form::label('students[]', $s->name,['class'=>'pr-1']) !!}
                                                {!! Form::checkbox('students[]', $s->id) !!}
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </fieldset>

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