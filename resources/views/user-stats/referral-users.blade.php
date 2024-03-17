<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <title>Total User</title>
</head>

<body>
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
                        <a class="nav-link " aria-current="page" href="javascript:void(0);">Home</a>
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
    <main>
<div class="mt-3 p-5" >
            <div class="title text-center">
    <h1 >Referral Users</h1>
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
    </main>

    <div class="footer copyright">
        <span>©All Right Reserved <a href="#">EasyBusinessSurvey.Com</a></span>
    </div>

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

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>