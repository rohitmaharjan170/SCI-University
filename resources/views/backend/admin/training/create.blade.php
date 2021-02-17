@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.training.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::open(['method'=>'POST','route'=>['admin.training.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_en','Title',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_en',old('title_en'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('title_en'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_fr','Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_fr',old('title_fr'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                @if ($errors->first('title_fr'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('title_fr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_en','Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_en',old('description_en'),['class'=>"form-control"]) !!}
                        @if ($errors->first('description_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('description_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_fr','Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_fr',old('description_fr'),['class'=>"form-control"]) !!}
                        @if ($errors->first('description_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('description_fr') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('short_description_en','Short Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('short_description_en',old('short_description_en'),['class'=>"form-control"]) !!}
                        @if ($errors->first('short_description_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('short_description_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('short_description_fr','Short Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('short_description_fr',old('short_description_fr'),['class'=>"form-control"]) !!}
                        @if ($errors->first('short_description_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('short_description_fr') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!!Form::label('price','Price',['class'=>'col-form-label']) !!}
                                {!! Form::number('price',old('price'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                @if ($errors->first('price'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!!Form::label('discount','Discount',['class'=>'col-form-label']) !!}
                                {!! Form::text('discount',old('discount'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                @if ($errors->first('discount'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!!Form::label('rating','Rating',['class'=>'col-form-label']) !!}
                                {!! Form::text('rating',old('rating'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                @if ($errors->first('rating'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!!Form::label('status','Status',['class'=>'col-form-label']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control select2']) !!}
                                @if ($errors->first('status'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('trainers','Trainer',['class'=>'col-form-label']) !!}
                        {!! Form::select('trainers[]', $trainers, old('trainer'), ['class'=>'form-control select2trainer','multiple'=>'multiple']) !!}
                        @if ($errors->first('trainer'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('trainer') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('tags','Tags',['class'=>'col-form-label']) !!}
                        {!! Form::select('tags[]', $tags, old('tags'), ['class'=>'form-control select2','multiple'=>'multiple']) !!}
                        @if ($errors->first('trainer'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('trainer') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                {!!Form::label('image','Banner Image',['class'=>'col-form-label']) !!}
                                <div>
                                    <div>
                                        {!! Form::file('image',$attributes = ['accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                    </div>
                                    @if ($errors->first('image'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {!!Form::label('video_url','Banner Youtube Video URL',['class'=>'col-form-label']) !!}
                                    {!! Form::text('video_url',old('video_url'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                    @if ($errors->first('video_url'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('video_url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row text-center">
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
                                        <td>{!! Form::file('images[]',$attributes = ['accept'=>"image/x-png,image/gif,image/jpeg"]) !!}</td>
                                        <td>
                                            <i class="fas fa-plus-square text-success fa-2x" data-table="image"
                                               onclick="addRow(this)"></i>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered video_urls">
                                    <thead>
                                    <tr>
                                        <th width="70%">Youtube Video URL</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{!! Form::text('video_urls[]',old('video_urls.*'),['class'=>"form-control","maxlength"=>"191"]) !!}</td>
                                        <td>
                                            <i class="fas fa-plus-square text-success fa-2x" data-table="video"
                                               onclick="addRow(this)"></i>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
            $(".select2trainer").select2({
                placeholder: "Select anyone",
                allowClear: true,
                tags: false
            });
        });

        function addRow(ctrl) {
            let choice = $(ctrl).data('table');
            let td;
            switch (choice) {
                case 'video':
                    td = '<tr>\n' +
                        '                                        <td><input class="form-control" maxlength="191" name="video_urls[]" type="text"></td>\n' +
                        '                                        <td>\n' +
                        '                                            <i class="fas fa-plus-square text-success fa-2x" data-table="video" onclick="addRow(this)"></i>\n' +
                        '                                            <i class="fas fa-minus-square text-danger fa-2x" onclick="deleteRow(this)"></i>\n' +
                        '                                        </td>\n' +
                        '                                    </tr>';
                    $('.video_urls > tbody').append(td);
                    break;
                case 'image':
                    td = '<tr>\n' +
                        '                                        <td><input name="images[]" type="file"></td>\n' +
                        '                                        <td>\n' +
                        '                                            <i class="fas fa-plus-square text-success fa-2x" data-table="image" onclick="addRow(this)"></i>\n' +
                        '                                            <i class="fas fa-minus-square text-danger fa-2x" onclick="deleteRow(this)"></i>\n' +
                        '                                        </td>\n' +
                        '                                    </tr>';
                    $('.images > tbody').append(td);

            }
        }

        function deleteRow(ctrl) {
            $(ctrl).parent().parent().remove();
        }
    </script>
@endpush