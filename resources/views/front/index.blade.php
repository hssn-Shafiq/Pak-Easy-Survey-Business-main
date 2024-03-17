@extends('layouts.user')

@section('title', 'User Page')

@section('content')
<main>
    <!--=======Intro-Section Starts Here=======-->
    <section id="banner-main">
        <div id="intro-example" class="container-fluid p-5 d-flex align-items-center   ">
            <div class="row mask d-flex justify-content-center align-items-center w-100 p-3">
                <div class="col-12 col-lg-7 description-col text-white d-flex justify-content-center  flex-column">
                    <h1 class="mb-4 title">Simple Profitable Conveniently</h1>
                    <h5 class="mb-4 description">
                        A Profitable platform for high-margin investment
                    </h5>
                </div>
                <div class="col-12 col-lg-5 image-col text-center d-flex justify-content-end">
                    <div class="image d-flex justify-content-center align-items-center">
                        <img src="assets/images/Vector.png" class="img-fluid" alt="" width="150">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Intro-Section Ends Here=======-->

    <!--=======Cards-Section Starts Here=======-->
    <section id="cards-main">
        <div class="container-fluid">
            <div class="row" id="D-container">
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (5).png" alt="" class="img-fluid" class="img-fluid" width="60">
                    <h4 class="text-bold py-3 ps-1">{{ $totalUsers }}</h4>
                    <p>Registered Users</p>
                </div>
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (6).png" alt="" class="img-fluid" class="img-fluid" width="60">
                    <h4 class="text-bold py-3 ps-1">Trusted</h4>
                    <p>Earning Guaranty</p>
                </div>
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (7).png" alt="" class="img-fluid" class="img-fluid" width="60">
                    <h4 class="text-bold py-3 ps-1">Rs. 36.9M</h4>
                    <p>Available Investment</p>
                </div>
            </div>
        </div>
    </section>
    <!--=======Cards-Section Ends Here=======-->

    <!--=======Welcome-Messege-Section Starts Here=======-->
    <section id="welcome-messege-main">
        <div class="container">
            <div class="row" id="row-wel">
                <div class="col-md-5 d-flex justify-content-center justify-content-lg-end pe-lg-5">
                    <div class="d-flex align-items-center" id="op-pic">
                        <img src="assets/images/Vector (4).png" alt="">
                    </div>
                </div>
                <div class="col-md-7 pt-4" id="welcome">
                    <h5>Welcome To Pak EasyBusinessSurvey</h5>
                    <h2>Simple Profitable Conveniently</h2>
                    <p>1. Point1</p>
                    <p>2. Point2</p>
                    <p>3. Point2</p>
                </div>
            </div>
        </div>
    </section>
    <!--=======Welcome-Messege-Section Starts Here=======-->
</main>
@endsection