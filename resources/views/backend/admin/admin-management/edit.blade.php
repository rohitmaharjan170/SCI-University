@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.manage.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($admin,['method'=>'PUT','route'=>['admin.manage.update',$admin->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('name','Full Name',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('name',old('name'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                @if ($errors->first('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('email','Email',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('email',old('email'),['class'=>"form-control",'required'=>'required']) !!}
                                @if ($errors->first('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('password','Password',['class'=>'col-form-label col-lg-2 require']) !!}
                                <input type="text" class="form-control" name="password" maxlength="191">
                                @if ($errors->first('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('password_confirmation','Password Confirmation',['class'=>'col-form-label']) !!}
                                {!! Form::text('password_confirmation',old('password_confirmation'),['class'=>"form-control","maxlength"=>"191"]) !!}
                                @if ($errors->first('password_confirmation'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- dont show permission edit for super admin -->
                    @if(auth('admin')->user()->id !== $admin->id)
                        <div class="form-group">
                            <div class="row">
                                @foreach($permissions->chunk(4) as $permission)
                                    <div class="col-md-4 mb-2">
                                        @foreach($permission as $key => $p)
                                            @if($loop->first)
                                                <h5>{{str_replace('-',' ',ucfirst($p->name))}} permissions</h5>
                                            @endif
                                            <ul style="list-style-type:none;">
                                                <li>
                                                    {!! Form::label('permission[]', str_replace('-',' ',$p->name),['class'=>'pr-1']) !!}
                                                    {!! Form::checkbox('permission[]', $p->name, $admin->hasPermissionTo($p->name) ) !!}
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endif

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
