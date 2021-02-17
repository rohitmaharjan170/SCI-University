@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.donation.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Back</a></h5>


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
                            <td>{{$donation->donor_name}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{$donation->donation_amount}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{$donation->donor_email}}</td>
                        </tr>
                        <tr>
                            <td>Description (fr)</td>
                            <td>{!! $donation->donor_message !!}</td>
                        </tr>
                        <tr>
                            <td>Donated Date and Time</td>
                            <td>{{formatDate($donation->created_at)}}</td>
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
