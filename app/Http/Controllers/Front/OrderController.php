<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Models\Service;
use Auth;
class OrderController extends Controller
{
    public function index()
    {
      $orders=ServiceOrder::with('service')->where('user_id',Auth::user()->id)->get();
      return view('frontend.Orders.index',compact('orders'));
    }
}
