<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">

    <title>1st Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4 px-m-0">
            <a class="navbar-brand" href="#">
                <img src="assets/images/ebslogo.png" alt="" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-5 ">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="javascript:void(0);">Home</a>
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
                    <button class="btn">Language</button>
                </div>
            </div>
        </div>
    </nav>

    <main>
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
        <!-- start Dollar Section-->
        <div class="container-fluid">
            <div class="row" id="D-container">
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (5).png" alt="" class="img-fluid" class="img-fluid"
                        width="60">
                    <h4 class="text-bold py-3 ps-1" >{{ $totalUsers }}</h4>
                    <p>Registered Users</p>
                </div>
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (6).png" alt="" class="img-fluid" class="img-fluid"
                        width="60">
                    <h4 class="text-bold py-3 ps-1">Trusted</h4>
                    <p>Earning Guaranty</p>

                </div>
                <div class="col-md-4" id="dollar">
                    <img src="assets/images/Vector (7).png" alt="" class="img-fluid" class="img-fluid"
                        width="60">
                    <h4 class="text-bold py-3 ps-1">Rs. 36.9M</h4>
                    <p>Available Investment</p>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="row" id="row-wel">
                <div class="col-md-6 d-flex justify-content-center justify-content-lg-end  pe-0 pe-lg-5">
                <div class= "d-flex align-items-center" id="op-pic" style="width: 240px;height:240px">
                    <img src="assets/images/Vector (4).png" alt="">
                </div>
                </div>
                <div class="col-md-6 pt-4" id="welcome">
                    <h5>Welcome EasyBusinessSurvey</h5>
                    <h2>Simple Profitable Conveniently</h2>
                    <p>1. Point1</p>
                    <p>2. Point2</p>
                    <p>3. Point2</p>

                </div>

            </div>
        </div>




    </main>
    <!-- End Main Sectio -->

    <!-- Start Footer Section -->
    <div class="container-fluid" id="footer-start">
        <div class="row align-items-center">
            <div class="col-md-4" id="about">
                <div class="brand ">
                    <a class="navbar-brand" href="index.html" style="float:left;">
                        <img src="assets/images/ebslogo.png" alt="PakEasy-BusinessSurvey-Logo" width="100">
                    </a>
                </div>
                <div class="description">
                <p>
                    There Will be Place all The description About The Company</p></div>
                <div class="icon d-flex align-items-center gap-2">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
            </div>
            <div class="col-md-4 link" id="links">
                <h3>Quick Links</h3>
                <a href="#">1. Why Us</a>
                <a href="#">2. Affiliate Program</a>
                <a href="{{route('register')}}">3. Join Us</a>

            </div>
            <div class="col-md-4" id="links">
                <h3>Pages</h3>
                <a href="#">1. Disclaimer</a>
                <a href="#">2. Privacy And Policy</a>
                <a href="#">3. Terms & Conditions</a>
            </div>
        </div>
    </div>
    <div class="footer copyright">
        <span>©All Right Reserved <a href="#">EasyBusinessSurvey.Com</a></span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
