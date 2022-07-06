
    @extends('layouts.Front.master-front')
    @section('content')
    <main class="pageWrapper">
        <div class="topSpecialities">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="commonTitle">My Orders</h3>
                    </div>
                </div>
                <div class="multiSpecialities d-flex">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#No</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Pyment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$order->service->name}}</td>
                                <td>${{$order->price}}</td>
                                <td>${{$order->qty}}</td>
                                <td>${{$order->total}}</td>
                                <td>{{$order->payment_status==1?'Paid':'Pending'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                   
                </div>
                
            </div>
        </div>
    </main>

    @endsection
    @section('script')
    @endsection

