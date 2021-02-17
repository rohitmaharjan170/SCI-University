@extends('frontend.layouts.app')
@push('styles')
    <style>
        .padding {
            padding: 5rem !important;
            margin-left: 300px
        }

        .card {
            margin-bottom: 1.5rem
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #c8ced3;
            border-radius: .25rem
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: #f0f3f5;
            border-bottom: 1px solid #c8ced3
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .form-control:focus {
            color: #5c6873;
            background-color: #fff;
            border-color: #c8ced3 !important;
            outline: 0;
            box-shadow: 0 0 0 #F44336
        }
        .donation-form{
            margin:50px 0;
        }
        .dontaion-img img{
            width: 100%;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.8);
        }
        .donation-form .form-group {
    margin-bottom: 10px;
}
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="donation-form">
            <div class="row">
                <div class="col-sm-6 dontaion-img">
                    <img src="https://www.insidehighered.com/sites/default/server_files/media/iStock-900872896_0.jpg">
                    <div class="donation-img-details">
                    <h5 class="universe-heading">Donation Title</h5>
                    <p>
                    This programme is for the students of Civil Engineering and Construction Management.This programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction Management.students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction Managementstudents of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction ManagementThis programme is for the students of Civil Engineering and Construction Management
                </p>
                </div>



                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Credit Card</h5>
                            <span>Enter your card details</span>
                        </div>
                        <div class="card-body">
                            <form action="{{route('donation.donate')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input class="form-control" name="first_name" type="text"
                                                   placeholder="first name" required    >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Last Name</label>
                                            <input class="form-control" name="last_name" type="text"
                                                   placeholder="last name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input class="form-control" id="email" type="text" name="email"
                                                   placeholder="enter your email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Credit Card Number</label>
                                            <div class="input-group">
                                                <input class="form-control" type="number" name="ccnumber"
                                                       placeholder="xxxx xxxx xxxx xxxx" maxlength="16" required>
                                                <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-credit-card"></i>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="ccmonth">Month</label>
                                        <input type="text" class="form-control" name="ccmonth" placeholder="01">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ccyear">Year</label>
                                        <input type="text" class="form-control" name="ccyear" placeholder="2020">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cvv">CVV/CVC</label>
                                            <input class="form-control" id="cvc" name="cvc" type="number"
                                                   placeholder="123">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Donation Amount</label>
                                            <input class="form-control" id="amount" type="text" name="amount"
                                                   placeholder="enter amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Message</label>
                                            <textarea name="message" class="form-control" cols="30" rows="3" maxlength="300" placeholder="enter you message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <button class="form-control btn btn-warning" name="donation_type" value="stripe" type="submit"><i class="fas fa-credit-card pr-2"></i>Card
                                            Donate
                                        </button>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <button class="form-control btn btn-warning" name="donation_type" value="paypal" type="submit"><i class="fab fa-paypal pr-2"></i>Paypal
                                            Donate
                                        </button>
                                    </div>
                                </div>
                        </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection