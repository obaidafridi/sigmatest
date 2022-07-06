
    @extends('layouts.Front.master-front')
    @section('content')
    <main class="pageWrapper">
        <div class="topSpecialities">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="commonTitle">Top Services</h3>
                    </div>
                </div>
                <div class="multiSpecialities d-flex">
                    @foreach($services as $service)
                    <div class="commonBox">
                        <div class="imgBox">
                            <img src="{{asset($service->image)}}" alt="" class="img-fluid">
                        </div>
                        <p>{{$service->name}}</p>
                        <p>
                            ${{$service->price}}<br>
                            <a href="{{url('/service/checkout',$service->id)}}" class="btn btn-primary">Buy Serice</a>
                        </p>

                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </main>

    @endsection
    @section('script')
    @endsection

