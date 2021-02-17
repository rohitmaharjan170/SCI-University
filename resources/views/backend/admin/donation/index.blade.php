@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Donations</h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10%">SN</th>
                            <th style="width: 40%">Name</th>
                            <th style="width: 30%;">Amount</th>
                            <th style="width: 30%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donations as $key => $d)
                            <tr>
                                <td>{{ $donations->firstItem() + $key }}</td>
                                <td>{{$d->donor_name}}</td>
                                <td>${{$d->donation_amount}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Choose
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('admin.donation.show', $d->id)}}"><i
                                                        class="fas fa-search"></i>&nbsp;&nbsp; View</a>
                                            <a class="dropdown-item"
                                               href="{{route('admin.donation.download.certificate', $d->id)}}"><i
                                                        class="fas fa-download"></i>&nbsp;&nbsp; Certificate</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">
                        {{$donations->links()}}
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
