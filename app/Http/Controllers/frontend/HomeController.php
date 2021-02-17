<?php

namespace App\Http\Controllers\frontend;

use App\models\Advertisement;
use App\models\Banner;
use App\models\Category;
use App\models\CompanyAssociate;
use App\models\Course;
use App\models\DeanMessage;
use App\models\Event;
use App\models\FeaturedStudent;
use App\models\Franchise;
use App\models\Gallery;
use App\models\Notice;
use App\models\Partner;
use App\models\Press;
use App\models\Program;
use App\models\SiteSetting;
use App\models\Team;
use App\models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['lang'] = $request->cookie('lang');
        $data['deanMessage'] = DeanMessage::where('status', true)->first();
        $data['notices'] = Notice::where('status',1)->get();
        $data['featuredStudent'] = FeaturedStudent::where('status',1)->get();
        $data['banners'] = Banner::where('status', true)->latest()->get();
        $data['advertisement'] = Advertisement::where('status', true)->latest()->get();
        $data['category'] = Category::where('status', true)->orderBy('order','asc')->limit(8)->with('programs')->get();
        $data['programs'] = Program::where('status', true)->latest()->limit(8)->get();
        $data['companyAssociateProjects'] = CompanyAssociate::where('status', true)->latest()->limit(8)->get();
        $data['franchise'] = Franchise::where('status', true)->latest()->limit(8)->get();
        $data['events'] = Event::where('status', true)->latest()->limit(8)->get();
        $data['teams'] = Team::where('status', true)->latest()->limit(8)->get();
        $data['testimonials'] = Testimonial::where('status', true)->latest()->limit(9)->get();
        $data['partners'] = Partner::where('status', true)->latest()->limit(8)->get();
        $data['press'] = Press::where('status', true)->latest()->limit(4)->get();
        $data['gallery'] = Gallery::where('status', true)->latest()->limit(10)->get();

        return view('frontend.index', $data);
//        return view('frontend.dropdown', $data);
    }

    public function acreditation(Request $request){
        $data['programs'] = Program::select('title_en','id')->pluck('title_en','id');

        return view('frontend.acreditation.acreditation',$data);
    }
}
