@extends('layouts.customer')


@section('litle', 'Customer Page')



@section('content')
    <a href="{{ route('front.withdraw') }}" class="btn btn-primary">Request Withdrawal</a>
    <a href="{{ route('user.withdrawals') }}" class="btn btn-primary">View Withdrawal Requests</a>
    <main>
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
                            <img src="assets/images/Vector.png" class="img-fluid" alt="" width="150">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- start Dollar Section-->
        <section id="cards-main-customer">
            <div class="container-fluid ">
                <div class="row" id="D-container">
                    {{-- @if ($userStats) --}}
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (1).png" alt="">
                        <h4 class="text-bold py-3 ps-1">Rs.
                            {{ $userStats->earnings + $userStats->reviews()->count() * 10 }}</h4>
                        <p>Your Total Balance</p>
                    </div>
                    {{-- @endif --}}
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (2).png" alt="">
                        <h4 class="text-bold py-3 ps-1">Level</h4>
                        <p>Your level is {{ $userLevel }} out of 12</p>
                    </div>
                    <div class="col-md-4" id="dollar">
                        <img src="assets/images/Vector (3).png" alt="">
                        <h3>Rs. 36.9M</h3>
                        <p>Your Withdraw Money</p>

                    </div>

                </div>
            </div>
        </section>
        <section id="Explore-massege-main">
            <div class="container mt-5">
                <div class="row d-flex  justify-content-center" id="op-pic-main">
                    <div class="d-flex align-items-center" id="op-pic"><img src="assets/images/Vector (4).png"
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
    </main>

@endsection
