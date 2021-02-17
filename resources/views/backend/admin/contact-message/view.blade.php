@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.contact.index')}}" class="btn btn-secondary"><i
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
                            <td>Name</td>
                            <td>{{$contact->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{!! $contact->email !!}</td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>{{$contact->subject}}</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{{$contact->message}}</td>
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
