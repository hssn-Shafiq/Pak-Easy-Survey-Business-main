@extends('layouts.user')

@section('title', 'User Page')

@section('content')

<main>

    <button type="button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Check Status</button>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            @if (Auth::check() && Auth::user()->admin_approvel_status === 'Approved')
            <p><b>Your account has been <b class="text-dark p-1 rounded-2 bg-success">approved</b>. You can now start earning.</p></b>
            <a href="{{ route('customer') }}" class="btn btn-primary">Go to Customer Page</a>
            @elseif (Auth::check() && Auth::user()->admin_approvel_status === 'Pending')
            <p><b>Your account approval is <b class="text-dark p-1 rounded-2 bg-warning">pending</b>. Please wait for admin approval.</b></p>
            @elseif (Auth::check() && Auth::user()->admin_approvel_status === 'Rejected')
            <p><b>Your account approval request has been <b class="text-dark p-1 rounded-2 bg-danger">rejected</b>. Please contact for more information.<a href="https://chat.whatsapp.com/G1cWIDlc57LEz1ZmEAl6Su">Whatsapp</a></b></p>
            @endif
        </div>
    </div>

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

    // Call startCounter for each counter
    startCounter("count1", 3690000); // Convert Rs 36.9M to 3690000
    startCounter("count2", 1010000); // Convert 10.1M to 1010000
</script>
@endsection
