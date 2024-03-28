@extends('layouts.customer')


@section('litle', 'Customer Page')


@section('content')
    <!--=======Main Body Starts Here=======-->
    <main class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <h4> {{ $message }}</h4>
            </div>
        @endif
        <!--=======Intro-Section Starts Here=======-->
        <section id="banner-main-customer">
            <div id="intro-example" class="container-fluid p-5 d-flex align-items-center   ">
                <div class="row mask d-flex justify-content-center align-items-center w-100 p-3">
                    <div class="col-12 col-lg-7 description-col text-white d-flex justify-content-center  flex-column">
                        <h1 class="mb-4 title">Opportunity For Online Earning</h1>
                        <h5 class="mb-4 description">
                            A Profitable platform for high-margin investment
                        </h5>
                        <h4 class="description">Referral Code:</h4>
                        <input class="input bg-none" type="disabled" id="shareable_link" name="shareable_link"
                            value="{{ Auth::check() ? route('register') . '?referral_code=' . Auth::user()->own_referral_code : '' }}"
                            style="background: none; border: none; color: white !important;" disabled>
                    </div>
                    <div class="col-12 col-lg-5 image-col text-center d-flex justify-content-end">
                        <div class="image d-flex justify-content-center align-items-center">
                            <img src="assets/images/customer.png" class="img-fluid" alt="" width="150">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Intro-Section Ends Here=======-->

        <!--=======Cards-Section Starts Here=======-->
        <section id="cards-main-customer">
            <div class="container-fluid ">
                <div class="row" id="D-container">
                    {{-- @if ($userStats) --}}
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (9).png" alt="">
                        <h3 class="text-secondary pt-3 ">
                            Refferal's Earning
=======
                    <img src="assets/images/Vector (1).png" alt="">
                    <h3 class="text-secondary pt-3">
                            Referral's Earning
                        </h3>
                        <h3> Rs {{ $totalEarnings }}</h3>
                    </div>
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (1).png" alt="">
                        <h3 class="text-secondary pt-3">
                            Review's Earning
                        </h3>
                        <h3 class="">Rs {{ Auth::user()->earnings }}</h3>
                    </div>
                    {{-- <a href="" class="btn btn-primary">Open User Dashboard</a> --}}

                    {{-- @endif --}}
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (2).png" alt="">
                        <h3 class="text-secondary py-3 ">Level: <span class="text-dark ms-3">{{$userLevel}}</span></h3>
                        <p>Your level is {{ $userLevel }} out of 12</p>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Cards-Section Ends Here=======-->

        <!--=======Explore-Messege-Section Starts Here=======-->
        <section id="Explore-massege-main">
            <div class="container mt-5">
                <div class="row d-flex  justify-content-center" id="op-pic-main">
                    <div class="d-flex align-items-center" id="op-pic"><img src="assets/images/welcome.png"
                            alt="">
                    </div>
                </div>
                <div class="row text-center mt-3">
                    <h4>Explore New Oppurtunities</h4>
                    <p class="wa">Find Your Work By Clicking On This Link <a
                            href="https://chat.whatsapp.com/G1cWIDlc57LEz1ZmEAl6Su">WhatsappGroup</a></p>
                </div>
            </div>
        </section>
        <!--=======Explore-Messege-Section Starts Here=======-->
    </main>
    <!--=======Main Body Ends Here=======-->
@endsection
