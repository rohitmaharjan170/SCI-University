<?php

function lang(){
    return request()->cookie('lang') ?? 'en';
}
