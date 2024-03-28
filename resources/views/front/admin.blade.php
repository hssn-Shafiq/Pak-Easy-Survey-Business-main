@extends('layouts.admin')

@section('title', 'Admin')


@section('content')
    <main class="content">
        <section id="intro">
            <div id="intro-example" class="container-fluid p-5 d-flex align-items-center   ">
                <div class="row mask d-flex justify-content-center align-items-center w-100 p-3">
                    <div class="col-12 col-lg-7 description-col text-white d-flex justify-content-center  flex-column">
                        <h1 class="mb-4 title">Welcome To Admin Dashboard</h1>
                        <h5 class="mb-4 description">
                            A Profitable platform for high-margin investment
                        </h5>
                    </div>
                    <div class="col-12 col-lg-5 image-col text-center d-flex justify-content-end">
                        <div class="image d-flex justify-content-center align-items-center">
                            <img src="assets/images/admin.png" class="img-fluid" alt="" width="150">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Intro-Section Ends Here=======-->

        <!-- start Dollar Section-->
        <section id="cards-main-admin">

        <div class="container-fluid">
                <div class="row bg-transparent" id="D-container">
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (9).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class="py-3 ps-1">{{ $totalUsers }}</h3>
                        <p><a href="{{ route('user-stats.index') }}">Total Customer</a></p>
                    </div>
                    <div class="col-md-4 " id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (5).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class="text-bold pt-4 ">
                            <p>New User Approval</p>
                        </h3>
                        <a href="{{ route('process.payment') }}" class="text-decoration-none text-dark">
                            <p>Approved Now</p>
                        </a>
                    </div>
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (11).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class="py-3 ">Rs. 36.9M</h3>
                        <p>Total Profit</p>
                    </div>

                </div>
                <div class="row bg-transparent" id="D-container">
                    <div class="col-md-4 " id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (3).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class="text-bold py-3">Withdrawal Request</h3>
                        <a href="{{ route('admin.withdrawals.index') }}" class="text-decoration-none text-dark">
                            <p>Check Now</p>
                        </a>
                    </div>
                    <div class="col-md-4 " id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (10).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class=" py-3">Approved Withdraw </h3>
                        <a href="{{ route('approved-withdrawals') }}" class="text-decoration-none text-dark">
                            <p>Take A Look</p>
                        </a>
                    </div>
                    <div class="col-md-4 " id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (10).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class=" py-3">Rejected Withdraw</h3>
                        <a href="{{ route('rejected.withdrawals') }}" class="text-decoration-none text-dark">
                            <p>Take A Look</p>
                        </a>

                    </div>
                </div>
                <!-- <div class="row bg-transparent  " id="D-container">
                    <div class="col-md-4 " id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (10).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h3 class=" py-3">Change Account </h3>
                        <a href="{{ route('add.select') }}" class="text-decoration-none text-dark">
                            <p>Add The Number</p>
                        </a>

                    </div>
                </div> -->
            </div>
        </section>
    </main>
@endsection
