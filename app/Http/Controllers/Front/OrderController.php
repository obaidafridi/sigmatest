<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Models\Service;
use Stripe;
use Auth;
use DB;
class OrderController extends Controller
{
    public function index()
    {
      $orders=ServiceOrder::with('service')->where('user_id',Auth::user()->id)->get();
      return view('frontend.Orders.index',compact('orders'));
    }


    //service details page
    public function checkout($id)
    {
       $services=Service::find($id);
        return view('frontend.services.checkout',compact('services'));  
    }
    //service checkout
    public function checkout_save(Request $request)
    {
         $service_id = $request->input('serviceid');
         $service = Service::find($service_id);
         $amount=$service->price*$request->qty;
       try{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
             $stripedata=Stripe\Charge::create ([
                    "amount" => $amount*100,
                    "currency" => "USD",
                    "source" => $request->stripeToken,
                    "description" => "Test Payment"
            ]);
             if($stripedata->status=="succeeded")
             {
                $serviceorder=new ServiceOrder();
                $serviceorder->qty=$request->qty;
                $serviceorder->price=$service->price;
                $serviceorder->total=$service->price*$request->qty;
                $serviceorder->user_id=Auth::user()->id;
                $serviceorder->service_id=$service->id;
                $serviceorder->payment_status=1;
                if($serviceorder->save())
                {
                    toastSuccess('Thank you for your order!!');
                    return redirect('thankyou')->with( ['serive' => $service]);
                }
                else{
                    toastError('Something Went Wrong');
                    return view('frontend.services.thankyou')->with('booking', $service);
                }

             }
            
        } catch (\Exception $exception) {
            toastError($exception->getMessage());
            return redirect()->back();
        }
    }
}
