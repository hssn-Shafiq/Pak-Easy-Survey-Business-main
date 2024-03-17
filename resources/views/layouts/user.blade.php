<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakEasyBusinesSurvey- A Merging Platform to Earn Through Surveys and Referrals</title>

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon2.png') }}">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4 px-m-0">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/ebslogo.png') }}" alt="" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-5 ">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Affiliate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-warning">Status Pending....</button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-0">
        @yield('content')
    </div>
    <div class="container-fluid" id="footer-start">
        <div class="row align-items-center">
            <div class="col-md-4" id="about">
                <div class="brand ">
                    <a class="navbar-brand" href="index.html" style="float:left;">
                        <img src="{{ asset('assets/images/ebslogo.png') }}" alt="PakEasy-BusinessSurvey-Logo" width="100">
                    </a>
                </div>
                <div class="description">
                    <p>
                        Pak Easy Business Survey offers users a simple way to earn money through product surveys and referrals. Join now to start earning effortlessly!</p>
                </div>
                <div class="icon d-flex align-items-center gap-2">
                    <a href="https://www.facebook.com/profile.php?id=61552257843543&mibextid=nb1MFm3jZYALyyMy"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" title="Not on Instagram Yet...😊"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" title="Not on Youtube Yet...😊"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://chat.whatsapp.com/G1cWIDlc57LEz1ZmEAl6Su"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-md-4 link" id="links">
                <h3>Quick Links</h3>
                <a href="{{ route('whyus') }}">1. Why Us</a>
                <a href="#">2. Affiliate Program</a>
                <a href="{{ route('register') }}">3. Join Us</a>

            </div>
            <div class="col-md-4" id="links">
                <h3>Pages</h3>
                <a href="{{ route('Disclaimer') }}">1. Disclaimer</a>
                <a href="{{ route('Privacy') }}">2. Privacy And Policy</a>
                <a href="{{ route('Condition') }}">3. Terms & Conditions</a>
            </div>
        </div>
    </div>
    <div class="footer copyright">
        <span>©All Right Reserved <a href="#">EasyBusinessSurvey.Com</a></span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>