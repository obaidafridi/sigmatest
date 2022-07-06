<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Support\Facades\Redirect;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
         try {
                $service = Service::count();
                $serviceorder=ServiceOrder::with('service')->whereHas('service', function ($query) {
                    $query->where('user_id', '=', Auth::user()->id);
                  })->count();
                return view('backend.dashboard',compact('service','serviceorder'));
            } catch (\Exception $exception) {
               toastError('Something went wrong, try again!');
               return Redirect::back();
            }
    }
}
