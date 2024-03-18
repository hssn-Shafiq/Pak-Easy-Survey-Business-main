<div class="top-header bg-dark">
    <div class="container-fluid">
        <div class="row px-0 px-lg-3 py-2 d-flex align-items-center">
            <div class="col-12 col-lg-9 welcome-user-header">
                <div class="welcome-user-messege">
                    <p class="mb-0 d-none d-md-block">Welcome To <b class="text-warning">Pak Easy Business Survey.</b> Please check your Account Activation Status to get Started <i class="fa-solid fa-arrow-right"></i></p>
                    <p class="d-block d-md-none text-center">Check your Account Status to Start Earn.<i class="fa-solid fa-arrow-down ms-2"></i></p>
                </div>
            </div>
            <div class="col-12 col-lg-3 text-center text-md-end">
                <div class="check-status-btn">
                    <button type="button" class="btn chk-status" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Check Status</button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            @if (Auth::check() && Auth::user()->admin_approvel_status === 'Approved')
                            <p><b>Your account has been <b class=" p-1 rounded-2 text-light bg-success">approved</b>. You can now start earning.</b></p>
                            <a href="{{ route('customer') }}" class="btn btn-success start-earn-btn mt-2">Start Earning Now</a>
                            @elseif (Auth::check() && Auth::user()->admin_approvel_status === 'Pending')
                            <p><b>Your account approval is <b class="text-dark p-1 rounded-2 bg-warning">pending</b>. Please wait for admin approval.</b></p>
                            @elseif (Auth::check() && Auth::user()->admin_approvel_status === 'Rejected')
                            <p><b>Your account approval request has been <b class="text-dark p-1 rounded-2 bg-danger">rejected</b>. Please contact for more information.<a href="https://chat.whatsapp.com/G1cWIDlc57LEz1ZmEAl6Su">Whatsapp</a></b></p>
                            @else
                            <p><b>You are logged out. Please <a href="{{ route('login') }}">login</a> to continue.</b></p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.user')

@section('title', 'User Page')

@section('content')

<main>



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
                        <img src="assets/images/user.png" class="img-fluid" alt="" width="150">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- start Dollar Section-->
    <section id="cards-main">
        <div class="container-fluid">
            <div class="row" id="D-container">
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (5).png" alt="" class="img-fluid" class="img-fluid" width="60">
                    <h3 id="counter2" class="text-bold py-3 ps-1"><span id="count1">0</span>M</h3>
                    <p>Registered Users</p>
                </div>
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (6).png" alt="" class="img-fluid" class="img-fluid" width="60">
                    <h3 class="text-bold py-3 ps-1">Trusted</h3>
                    <p>Earning Guaranty</p>

                </div>
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (7).png" alt="" class="img-fluid" class="img-fluid" width="60">
                    <h3 id="counter1" class="text-bold py-3 ps-1">Rs: <span id="count2">0</span>M</h3>
                    <p>Available Investment</p>

                </div>

            </div>
        </div>
    </section>

    <section id="welcome-messege-main">
        <div class="container">
            <div class="row" id="row-wel">
                <div class="col-md-5 d-flex justify-content-center justify-content-lg-end pe-lg-5">
                    <div class="d-flex align-items-center" id="op-pic">
                        <img src="assets/images/welcome.png" alt="">
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
</main>

<script>
    // Function to format the counter value
    function formatCounterValue(value) {
        if (value >= 1000000) {
            return (value / 1000000).toFixed(1);
        } else {
            return value;
        }
    }

    // Function to start the counter animation
    function startCounter(elementId, targetValue) {
        let currentCount = 0;
        const speed = 1500; // Speed of animation in milliseconds

        const increment = Math.ceil(targetValue / (speed / 100));

        const counterInterval = setInterval(() => {
            if (currentCount >= targetValue) {
                clearInterval(counterInterval);
                currentCount = targetValue;
            } else {
                currentCount += increment;
            }
            document.getElementById(elementId).textContent = formatCounterValue(currentCount);
        }, 100);
    }

    // Create an Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start the counter animation when "cards-main" section intersects with the viewport
                startCounter("count1", 3690000); // Convert Rs 36.9M to 3690000
                startCounter("count2", 1010000); // Convert 10.1M to 1010000
                // Disconnect the observer since it's no longer needed
                observer.disconnect();
            }
        });
    }, {
        threshold: 0.5
    }); // Trigger when at least 50% of the section is visible

    // Observe the "cards-main" section
    observer.observe(document.getElementById("cards-main"));
</script>
@endsection