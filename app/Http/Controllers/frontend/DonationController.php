<?php

namespace App\Http\Controllers\frontend;

use App\Mail\DonationSuccessMail;
use App\models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;

class DonationController extends Controller
{
    public function index()
    {
        $data['title'] = 'Donate';
        return view('frontend.donate.index',$data);
    }

    public function donate(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'ccnumber' => 'required',
            'ccmonth' => 'required',
            'ccyear' => 'required',
            'cvc' => 'required',
            'amount' => 'required'
        ]);

        //purchase code logic here
        //check if the student has already purchased the course
        //if student has not purchased then signup that student
        //purchase the course using old email or new login email
        //store in course_purchase table
        try {
            $fullName = $request->first_name . ' '.$request->last_name;
            $email = $request->email;
            $ccNumber = $request->ccnumber;
            $ccMonth = $request->ccmonth;
            $ccYear = $request->ccyear;
            $cvc = $request->cvv;
            $donationAmount = $request->amount;
            $message = $request->message;

            //donate with stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new StripeClient(env('STRIPE_KEY'));
            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $ccNumber,
                    'exp_month' => $ccMonth,
                    'exp_year' => $ccYear,
                    'cvc' => $cvc,
                ],
            ]);

            if (empty($token->id)) {
                customErrorMessage('Donation failed something went wrong','Donation Failed');
                return redirect()->back()->withInput($request->all());
            }

            $charge = Charge::create([
                'card' => $token->id,
                'currency' => 'USD',
                'amount' => $donationAmount * 100,
                'description' => 'donation from ' . $fullName
            ]);

            //check if charge successful
            if (!empty($charge->id)) {
                //store the donation record
                $donation = Donation::create([
                    'donor_name' => $fullName,
                    'donor_email' => $email,
                    'donation_amount' => $donationAmount,
                    'donor_message' => $message
                ]);

                //send donation email
                if (!empty($email))
                    Mail::to($email)->send(new DonationSuccessMail($donation));

                customSuccessMessage('Donation Successful!','Success');

                return redirect('/');
            }
            else{
                customErrorMessage('Unable to donate!','Failed');
                return back()->withInput($request->all());
            }

        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
            return back()->withInput($request->all());
        }
    }
}
