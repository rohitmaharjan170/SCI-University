<?php

namespace App\Http\Controllers\backend;

use App\models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
class DonationController extends Controller
{
    public function index()
    {
        $data['title'] = 'Donations';
        $data['donations'] = Donation::latest()->paginate(30);

        return view('backend.admin.donation.index', $data);
    }

    public function show($id)
    {
        $data['title'] = 'Donation';
        $data['donation'] = Donation::findOrFail($id);

        return view('backend.admin.donation.view', $data);
    }

    public function downloadCertificate($id)
    {
        $data['donation'] = Donation::findOrFail($id);
        $pdf = PDF::loadView('backend.admin.donation.certificate', $data)->setPaper('a4', 'landscape');
        return $pdf->download('certificate.pdf');
    }
}
