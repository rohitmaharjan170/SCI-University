<?php

namespace App\Http\Controllers\frontend;

use App\models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $data['title'] = 'Gallery';
        $data['lang'] = lang();
        $data['gallery'] = Gallery::latest()->get();
        return view('frontend.gallery.index', $data);
    }

    public function show(Gallery $gallery)
    {
        $data['title'] = 'Gallery Images';
        $data['lang'] = lang();
        $gallery = $gallery;
        $data['description'] = $data['lang'] === 'fr' ? $gallery->description_fr : $gallery->description_en;
        $data['images'] = $gallery->images;

        return view('frontend.gallery.view', $data);
    }

}
