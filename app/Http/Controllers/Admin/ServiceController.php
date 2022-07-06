<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Validations;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Utils\HelperFunctions;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::where(['user_id'=>Auth::user()->id])->get();
        return view('backend.service', compact('service'));
    }

    public function dashboard()
    {
        $service = Service::count();
        $serviceorder=ServiceOrder::with('service')->whereHas('service', function ($query) {
            $query->where('user_id', '=', Auth::user()->id);
          })->count();
        return view('backend.dashboard',compact('service','serviceorder'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Validations::storeService($request);
        try {
            $all_inputs  = $request->except('_token', 'image');
            #uploading Image
            if ($request->file('image')) {
                $filePath = 'uploads/service/';
                $file = $request->file('image');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['image'] = $imagename;
            }
            if ($request->is_active == 'on') {
                $all_inputs['is_active'] = 1;
            }
            $all_inputs['user_id']=Auth::user()->id;
            Service::create($all_inputs);
            toastSuccess('Service successfully added!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $all_inputs  = $request->except('_token', 'image', '_method', 'id');
            $all_inputs['is_active'] = 0;
            #uploading Image
            if ($request->file('image')) {
                $filePath = 'uploads/Category/';
                $file = $request->file('image');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $all_inputs['image'] = $imagename;
            }
            if ($request->is_active == 'on') {
                $all_inputs['is_active'] = 1;
            }
            Service::find($request->id)->update($all_inputs);
            toastSuccess('Service successfully updated!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    
    public function destroy($id)
    {
        try {
            Service::find($id)->delete();
            toastSuccess('Service successfully Deleted!');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function service_orders()
    {
         $serviceorder=ServiceOrder::with('service')->whereHas('service', function ($query) {
            $query->where('user_id', '=', Auth::user()->id);
          })->get();
         return view('backend.serviceorder',compact('serviceorder'));
    }
}
