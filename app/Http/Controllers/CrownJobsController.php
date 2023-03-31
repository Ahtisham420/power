<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrownJob;
use App\ContactUs;
use App\FooterMail;

class CrownJobsController extends Controller
{
public  function  index(){
    $categories = FooterMail::orderBy('id', 'desc')->paginate(8);

    return view('subcriberlist.index', compact('categories'));
}

public  function  ContactIndex(){
    $categories = ContactUs::orderBy('id', 'desc')->paginate(8);

    return view('contact-us.index', compact('categories'));
}

}
