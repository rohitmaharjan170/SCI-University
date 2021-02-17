@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.gallery.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($gallery,['method'=>'PUT','route'=>['admin.gallery.update',$gallery->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_en','Title (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_en',old('title_en'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_fr','Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_fr',old('title_fr'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_en','Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_en',old('description_en'),['class'=>"form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_fr','Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_fr',old('description_fr'),['class'=>"form-control"]) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('status','Status',['class'=>'']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('image','Image',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div>
                                    {!! Form::file('image') !!}
                                </div>
                                @if($errors->first('image'))
                                    <small class="text-danger">{{$errors->first('image')}}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <table class="table table-bordered images">
                                <thead>
                                <tr>
                                    <th width="70%">Image</th>
                                    <th width="30%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{!! Form::file('images[]') !!}</td>
                                    <td>
                                        <i class="fas fa-plus-square text-success fa-2x" data-table="image"
                                           onclick="addRow(this)"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{$gallery->getImagePathAttribute()}}" width="420px" alt="Gallery Image">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p>Gallery Images</p>
                    <div class="form-group">
                        <div class="row">
                            @foreach($gallery->images as $img)
                                <div class="col-md-4 mb-2">
                                    <div class="card" style="width: 400px">
                                        <img class="card-img-top" src="{{$img->getImagePathAttribute()}}" alt="">
                                        <div class="card-body text-center">
                                            <p class="card-text"><a href="{{route('admin.gallery.destroy.image.item',$img->id)}}" onclick="return confirm('Are you sure?')" ><i class="fas fa-trash text-danger fa-2x"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    {!! Form::close() !!}
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row"></div>
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
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: "Select anyone",
                allowClear: false,
                tags: false
            });

        });

        function addRow(ctrl) {
            let td = '<tr>\n' +
                '                                        <td><input name="images[]" type="file"></td>\n' +
                '                                        <td>\n' +
                '                                            <i class="fas fa-plus-square text-success fa-2x" data-table="image" onclick="addRow(this)"></i>\n' +
                '                                            <i class="fas fa-minus-square text-danger fa-2x" onclick="deleteRow(this)"></i>\n' +
                '                                        </td>\n' +
                '                                    </tr>';
            $('table > tbody').append(td);
        }

        function deleteRow(ctrl) {
            $(ctrl).parent().parent().remove();
        }
    </script>
@endpush
