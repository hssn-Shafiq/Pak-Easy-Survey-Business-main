@extends('layouts.admin')

@section('title', 'Admin')


@section('content')

    <a href="{{ route('process.payment') }}" class="btn btn-primary">Admin Dashboard</a>

    <main>
        <section id="intro">
            <div id="intro-example" class="container-fluid p-5 d-flex align-items-center   ">
                <div class="row mask d-flex justify-content-center align-items-center w-100 p-3">
                    <div class="col-12 col-lg-7 description-col text-white d-flex justify-content-center  flex-column">
                        <h1 class="mb-4 title">Welcome To Admin Dashboard</h1>
                        <h5 class="mb-4 description">
                            A Profitable platform for high-margin investment
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Intro-Section Ends Here=======-->

        <!-- start Dollar Section-->
        <section id="cards-main-admin">
            <div class="container-fluid">
                <div class="row" id="D-container">
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (9).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h4 class="py-3 ps-1">{{ $totalUsers }}</h4 class="py-3 ps-1">
                        <p><a href="{{ route('user-stats.index') }}">Total Customer</a></p>
                    </div>
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (10).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h4 class="py-3 ps-1">10 Requests</h4 class="py-3 ps-1">
                        <p>Payment Pending Requests</p>

                    </div>
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (11).png" alt="" class="img-fluid" class="img-fluid"
                            width="60">
                        <h4 class="py-3 ps-1">Rs. 36.9M</h4 class="py-3 ps-1">
                        <p>Total Profit</p>

                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
