<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    function TermsConditions(){
        return view("web.pages.TermsConditions");
    }
}
