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
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="padding">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Credit Card</strong>
                            <small>enter your card details</small>
                        </div>
                        <div class="card-body">
                            <form action="{{route('purchase.course',$course->slug)}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input class="form-control" name="first_name" type="text"
                                                   placeholder="first name" required>
                                            @if($errors->first('first_name'))
                                                <span class="text-danger">{{$errors->first('first_name')}}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Last Name</label>
                                            <input class="form-control" name="last_name" type="text"
                                                   placeholder="last name" required>
                                            @if($errors->first('last_name'))
                                                <span class="text-danger">{{$errors->first('last_name')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input class="form-control" id="email" type="text" name="email"
                                                   value="{{$userInfo->email ?? null}}"
                                                   placeholder="enter your email" required
                                                   @if(!empty($userInfo)) readonly @endif>
                                            @if($errors->first('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
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
                                            @if($errors->first('ccnumber'))
                                                <span class="text-danger">{{$errors->first('ccnumber')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="ccmonth">Month</label>
                                        <input type="text" class="form-control" name="ccmonth" placeholder="01">
                                        @if($errors->first('ccmonth'))
                                            <span class="text-danger">{{$errors->first('ccmonth')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ccyear">Year</label>
                                        <input type="text" class="form-control" name="ccyear" placeholder="2020">
                                        @if($errors->first('ccyear'))
                                            <span class="text-danger">{{$errors->first('ccyear')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cvv">CVV/CVC</label>
                                            <input class="form-control" id="cvc" name="cvc" type="number"
                                                   placeholder="123">
                                            @if($errors->first('cvc'))
                                                <span class="text-danger">{{$errors->first('cvc')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <button class="btn btn-sm btn-success " type="submit">
                                        <i class="mdi mdi-gamepad-circle"></i> Purchase Course
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('button').click(function () {
            $(this).attr('disabled', 'disabled');
            $(this).parents('form').submit();
        });
    </script>
@endpush