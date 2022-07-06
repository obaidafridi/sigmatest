<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceOrder;
use DB;
use Stripe;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        $services=Service::where(['is_active'=>1])->get();
        return view('frontend.home',compact('services'));
    }
    
}
