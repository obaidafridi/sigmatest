@extends('layouts.Backend.master')
@section('css')
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">#No</th>
                                <th class="min-w-100px">Service Name</th>
                                <th class="min-w-100px">price</th>
                                <th class="min-w-100px">qty</th>
                                <th class="min-w-100px">Total</th>
                                <th class="min-w-100px">Image</th>
                                <th class="min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @foreach($serviceorder as $order)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->service->name}}</td>
                                <td>${{$order->price}}</td>
                                <td>{{$order->qty}}</td>
                                <td>${{$order->qty*$order->price}}</td>
                                <td><img src="{{asset($order->service->image)}}" width="60px" height="60px" /></td>
                                <td class="">
                                    
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection
@section('script')
@include('layouts.sweetalert.sweetalert_js')
<script>
    function editspecialty($data) {
        var data = JSON.parse($data);
        console.log(data);
        $("#kt_modal_edit_specialty_form").attr('action', 'service/' + data.id);
        $("#editid").val(data.id);
        $("#editname").val(data.name);
        $("#editprice").val(data.price);
        if (data.is_active == '1') {
            $("#editservice").prop('checked', true);
        }
        $("#kt_modal_edit_specialty").modal('show');
    }
</script>
@endsection