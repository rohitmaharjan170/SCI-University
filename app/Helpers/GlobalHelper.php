<?php

use App\models\CMS;
use App\models\SiteSetting;

function limitString($data){
    return substr($data,0,120);
}

function limitStringByLength($data,$words){
    return substr($data,0,$words);
}

function SiteSettings($columnName){
    return SiteSetting::select($columnName)->first()->$columnName;
}

function getCMS($pageName){
    return CMS::select('content')->where('page_type',$pageName)->first()->content;
}