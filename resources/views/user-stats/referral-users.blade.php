<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">

    <title>Total User</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid px-4 px-m-0">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/ebslogo.png" alt="" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-5 ">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('customer') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Why Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('referral-users') }}">Affiliate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign In</a>
                        </li>
                        @else
                        <li class="nav-item dropdown profile-dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>

                        @endguest
                    </ul>

                    <div class="d-flex">
                        <li class="nav-item dropdown dropstart">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Refer a Friend
                            </a>
                            <ul class="dropdown-menu refered-dropdown" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">
                                        <input class="input" type="disabled" id="shareable_link" name="shareable_link" value="{{ Auth::check() ? route('register') . '?referral_code=' . Auth::user()->own_referral_code : '' }}" disabled>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="copyShareableLink()">Share
                                            Link</button>
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <div>
                                            {{-- <span>Referral Code: {{ Auth::user()->own_referral_code }}</span> --}}
                                            <input type="disabled" id="hiddenReferralCode" value="{{ Auth::user()->own_referral_code }}" disabled>
                                            <button class="btn btn-sm btn-outline-secondary" onclick="copyReferralCode()">Copy Code</button>
                                        </div>
                                    </a></li>
                            </ul>
                        </li>

                    </div>

                </div>
            </div>
        </nav>
    </header>
    <main class="content">
        <!--=======customer-dashboard-banner Starts Here=======-->
        <section id="customer-dashboard-banner">
            <div class="container-fluid p-5  rounded cust-banner-main">
                <h1 class="text-light">Welcome To Dashboard</h1>
                <p class="text-light">Manage All Your Earnings Here</p>
                <div class="row bg-transparent" id="D-container">
                    <div class="col-md-4 bg-light" id="dollar">
                        <img src="assets/images/Vector (5).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class="text-bold pt-4  ps-1">
                            <p>12</p>
                        </h3>
                        <a href="javascript:void(0);" id="openReferralUserTable" class="text-decoration-none text-dark">
                            <p>Total Referrals</p>
                        </a>
                    </div>
                    <div class="col-md-4 bg-light" id="dollar">
                        <img src="assets/images/Vector (7).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class="text-bold py-3 ps-1">Rs. 36.9M</h3>
                        <a href="javasript:void(0)" class="text-decoration-none text-dark">
                            <p>Your Withdrawal Balance</p>
                        </a>
                    </div>
                    <div class="col-md-4 bg-light" id="dollar">
                        <img src="assets/images/Vector (7).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h5 class=" py-3 ps-1">Withdraw Status: <span class="text-secondary">No withdraw taken</span> </h5>
                        <a href="javascript:void(0)" id="take_withdraw_form" class="text-decoration-none text-dark">
                            <p>Take A Withdraw</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--=======customer-dashboard-banner Ends Here=======-->
    <div class="container show_messge_form my-5">
    @if ($message = Session::get('error'))
           <div class="row text-center p-5">
        <p class="text-danger"><b>{{$message}}</b></p>
           </div>
           @endif
    </div>
        <!--=======All Referrals Table Starts Here=======-->
        <section id="all_referrals_user">
            <div class="mt-5 p-5">
                <div class="title text-center">
                    <h1>Your Referral Users</h1>
                </div>
                <div style="overflow-x: auto;" class="mt-4">
                    <table class="user-stat-table">
                        <thead class=" --primary-color ">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Referral Code</th>
                                <th>Registration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allReferralUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->referral_code }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--=======All Referrals Table Ends Here=======-->

        <!--=======Take Withdraw form Starts Here=======-->
        <section id="Take_Withdraw_form">
            
            <div class="container mt-5 p-5 d-flex align-items-center justify-content-center">
                <form class="registration-form withdraw-form" id="withdraw_form" action="{{ route('withdrawals.store') }}" method="POST">
                    @csrf
                    <h3 class="text-center title">Take A Withdraw Now</h3>
                    <p class="text-center text-danger"><b>Please fill out all the fields carefully</b></p>

                    <!-- Name -->
                    <div class="flex-column">
                        <label for="name">Select Bank*</label>
                    </div>
                    <div class="inputForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z" />
                            <path d="M21 9V5H3v4H0v11h24V9h-3zM5 7h14v2H5V7zm14 10H5v-4h14v4zm0-6H5V9h14v2z" />
                        </svg>
                        <select class="input form-select" id="bank" name="bank" required>
                            <option value="">Select Bank</option>
                            <option value="jazzcash">Jazzcash</option>
                            <option value="easypaisa">Easypaisa</option>
                        </select>
                    </div>

                    <!-- Name -->
                    <div class="flex-column">
                        <label for="name">Bank User_Name*</label>
                    </div>
                    <div class="inputForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z" />
                            <path d="M18 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 18H6V10h12v10zm-6-2H8v-2h4v2zm0-4H8v-2h4v2zm0-4H8V8h4v2zm6 8h-2v-2h2v2zm0-4h-2V9h2v2z" />
                        </svg>
                        <input placeholder="Enter your Bank's User Name" class="input" type="text" id="account_name" name="account_name" required autofocus autocomplete="name">
                    </div>

                    <!-- Email -->
                    <div class="flex-column">
                        <label for="bank_number">Bank Number*</label>
                    </div>
                    <div class="inputForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z" />
                            <path d="M18 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM9 10h6v2H9v-2zm0 4h6v2H9v-2z" />
                        </svg>
                        <input placeholder="Enter your Bank Number" class="input" type="number" id="account_number" name="account_number" required autocomplete="bank_number">
                    </div>

                    <!-- Password -->
                    <div class="flex-column">
                        <label for="withdraw_amount">Withdraw Amount*</label>
                    </div>
                    <div class="inputForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z" />
                            <path d="M20 5h2v14h-2V5zM2 11h2v8H2v-8zm4-4h2v12H6V7zm4 8h2v4h-2v-4zm4-8h2v12h-2V7z" />
                        </svg>
                        <input placeholder="Enter Amount To Withdraw" class="input" type="number" id="amount" name="amount" required autocomplete="withdraw_amount">
                    </div>
                    <span>It will take almost 2 hours to process your request. Please wait patiently😊</span>
                    <button type="submit" class="button-submit">Take Withdraw</button>
                </form>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h3 class="modal-title" id="withdrawModalLabel">Thanks for Your Request</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-success" id="withdrawModalBody">
                    <!-- Withdrawal message will be displayed here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer copyright">
        <span>©All Right Reserved <a href="/">EasyBusinessSurvey.Com</a></span>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hiddenReferralCodeElement = document.getElementById('hiddenReferralCode');
            const copyReferralCodeButton = document.getElementById('copyReferralCode');

            copyReferralCodeButton.addEventListener('click', function() {
                copyReferralCode();
            });

            function copyReferralCode() {
                const referralCode = hiddenReferralCodeElement.value;
                navigator.clipboard.writeText(referralCode).then(function() {
                    showToast('Referral code copied! Paste it wherever you want.');
                }, function() {
                    showToast('Failed to copy referral code.');
                });
            }

            function showToast(message) {
                const toastElement = document.getElementById('toast');
                toastElement.innerText = message;
                toastElement.classList.add('show');

                setTimeout(function() {
                    toastElement.classList.remove('show');
                }, 2000);
            }
        });


        function copyShareableLink() {
            const shareableLinkInput = document.getElementById('shareable_link');
            shareableLinkInput.select();
            document.execCommand('copy');
            alert('Link copied to clipboard');
        }

        function copyReferralCode() {
            var referralCode = document.getElementById('hiddenReferralCode').value;
            navigator.clipboard.writeText(referralCode).then(function() {
                alert('Referral code copied to clipboard: ' + referralCode);
            }, function() {
                alert('Failed to copy referral code to clipboard.');
            });
        }
    </script>
    <script>
        const form = document.getElementById('Take_Withdraw_form');
        const table = document.getElementById('all_referrals_user');
        const showFormButton = document.getElementById('take_withdraw_form');
        const showTableButton = document.getElementById('openReferralUserTable');

        // Initially hide the form off-screen
        form.style.transform = "translateX(-100%)";
        form.style.display = "none";

        showFormButton.addEventListener('click', function() {
            if (form.style.display === "none") {
                form.style.display = "block"; // Show the form
                setTimeout(() => {
                    form.style.transform = "translateX(0)"; // Slide in the form
                }, 10);
                table.style.display = "none"; // Hide the table
            } else {
                form.style.transform = "translateX(-100%)"; // Slide out the form
                setTimeout(() => {
                    form.style.display = "none"; // Hide the form after animation
                }, 500); // Adjust the timing to match the CSS transition duration
                table.style.display = "block"; // Hide the table
            }
        });

        showTableButton.addEventListener('click', function() {
            if (table.style.display === "none") {
                table.style.display = "block"; // Show the table
                setTimeout(() => {
                    table.style.transform = "translateX(0)"; // Slide in the table
                }, 10);
                form.style.display = "none"; // Hide the form
            } else {
                table.style.transform = "translateX(-100%)"; // Slide out the table
                setTimeout(() => {
                    table.style.display = "none"; // Hide the table after animation
                }, 500); // Adjust the timing to match the CSS transition duration
            }
        });
    </script>
    <script>
        // Handle form submission
        document.getElementById('withdrawForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            // Perform your form submission logic here

            // Show modal
            var withdrawModal = new bootstrap.Modal(document.getElementById('withdrawModal'));
            var withdrawModalBody = document.getElementById('withdrawModalBody');
            withdrawModalBody.innerHTML = 'Your withdrawal request has been submitted successfully. It will take almost 2 hours to process your request. Please wait patiently. Keep checking your withdraw status in your dashboard.😊';
            withdrawModal.show();
        });
    </script>
    

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
