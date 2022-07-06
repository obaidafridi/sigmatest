
    @extends('layouts.Front.master-front')
    @section('content')
    <main class="pageWrapper">
        <div class="topSpecialities">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3 class="commonTitle">My Profile</h3>
                    </div>
                </div>
                <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-7">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="row" style="padding:20px">
                            
                            <div class="col-md-6 ">
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Name" name="name" value="{{old('name') ?: Auth::user()->name }}" required />
                            </div>

                            <div class="col-md-6 ">
                                <label class="required fs-6 fw-bold mb-2">Email</label>
                                <input type="email" class="form-control form-control-solid" placeholder="Email" name="email" value="{{old('email') ?: Auth::user()->email }}" required/>
                            </div>
                        </div>
                         <div class="row " style="padding:20px">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-bold mb-2">New Password</label>
                                <input type="password" class="form-control form-control-solid" placeholder="Password" name="password" required/>
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-bold mb-2">Confirm New Password</label>
                                <input type="password" class="form-control form-control-solid" placeholder="Confirm Password" name="password_confirmation" required/>
                            </div>
                        </div>
                        <br>
                        <button class="addBtn btn btn-primary er fs-6 px-8 py-4">
                            Update Profile
                        </button>

                    </form>

                </div>
                <!--end::Card body-->
                <!--end::Card body-->
                <hr>
               
            </div>
            <!--end::Card-->
                
            </div>
        </div>
    </main>
    @endsection
    @section('script')
    @endsection

