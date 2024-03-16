<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body style="background: #cc7c2d;">
    <div class="main">
        <div class=" reg-header p-3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-4 backlink">
                        <a href="#" onclick="history.back()" class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-angles-left"></i>
                            <span>Return to EasyBusiness</span></a>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a href="#"><img src="/assets/images/ebslogo.png" alt="" width="170px" style="filter: drop-shadow(2px 4px 6px black);"></a>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>


        </div>
        <div class="reg-form d-flex align-items-center justify-content-center mt-5">
            <form class="registration-form" method="POST" action="{{ route('register') }}">
                <h3 class="text-center title">WELCOME TO PAK EBS</h3>
                <div class="registration-fee text-center">
                    <p class="mb-0 main-heading">Please Pay(pkr:1000) Your Registeration Fees For Account Activation</p>
                    <p class="mb-0 sub-heading">EasyPaisa Name: MOHSIN PATHAN</p>
                    <p class="mb-0 sub-heading">EasyPaisa Number: 03412795290</p>
                </div>
                @csrf

                <!-- Name -->
                <div class="flex-column">
                    <label for="name">Name*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zM12 7c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3zm0 5c-1.651 0-3.001-1.349-3.001-3s1.35-3 3.001-3c1.651 0 3.001 1.349 3.001 3s-1.35 3-3.001 3z" />
                    </svg>
                    <input placeholder="Enter your Name" class="input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                </div>
                @error('name')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror

                <!-- Email -->
                <div class="flex-column">
                    <label for="email">Email*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20">
                        <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z" />
                    </svg>
                    <input placeholder="Enter your Email" class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                @error('email')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <!-- Password -->
                <div class="flex-column">
                    <label for="password">Password*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20">
                        <path d="M336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                        </path>
                        <path d="M304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                        </path>
                    </svg>
                    <input placeholder="Enter your Password" class="input" type="password" name="password" required autocomplete="new-password">
                </div>
                @error('password')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror

                <!-- Confirm Password -->
                <div class="flex-column">
                    <label for="password_confirmation">Confirm Password*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20">
                        <path d="M336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                        </path>
                        <path d="M304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                        </path>
                    </svg>
                    <input placeholder="Repeat Password" class="input" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
                @error('password_confirmation')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <!-- Referral Code -->
                <div class="flex-column">
                    <label for="referral_code">Referral Code*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zM9 14h6c.553 0 1-.447 1-1s-.447-1-1-1H9c-.553 0-1 .447-1 1s.447 1 1 1zm6-6H9c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z" />
                    </svg>
                    <input placeholder="Enter your Referral Code" class="input" type="text" name="referral_code" value="{{ old('referral_code') }}">
                </div>
                @error('referral_code')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <div class="flex-column">
                    <label for="referral_code">Our Bank</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M21 9V5H3v4H0v11h24V9h-3zM5 7h14v2H5V7zm14 10H5v-4h14v4zm0-6H5V9h14v2z" />
                    </svg>

                    <input placeholder="Easypaisa" class="input" type="text" name="Bank_name" value="Easypaisa" disabled>
                </div>
                @error('bank_name')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <div class="flex-column">
                    <label for="referral_code">Enter Your Bank Username*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M18 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 18H6V10h12v10zm-6-2H8v-2h4v2zm0-4H8v-2h4v2zm0-4H8V8h4v2zm6 8h-2v-2h2v2zm0-4h-2V9h2v2z" />
                    </svg>


                    <input placeholder="Your bank's username" class="input" type="text" name="bank_user_name" required autofocus autocomplete="bank_user_name">
                </div>
                @error('bank_name')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <div class="flex-column">
                    <label for="referral_code">Sender Number*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M18 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM9 10h6v2H9v-2zm0 4h6v2H9v-2z" />
                    </svg>

                    <input placeholder="Your number from where you sent registeration fees" class="input" type="number" name="sender_number" required autofocus autocomplete="sender_number">
                </div>
                @error('sender_number')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <div class="flex-column">
                    <label for="TRX_number">TRX or TID Num*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M20 5h2v14h-2V5zM2 11h2v8H2v-8zm4-4h2v12H6V7zm4 8h2v4h-2v-4zm4-8h2v12h-2V7z" />
                    </svg>

                    <input placeholder="Enter TID or TRX num or Transcation" class="input" type="text" name="TRX_number" required autofocus autocomplete="TRX_number">
                </div>
                @error('TRX_number')
                <p class="error text-danger mb-0">{{ $message }}</p>
                @enderror
                <!-- Submit Button -->
                <button type="submit" class="button-submit">{{ __('Register') }}</button>

                <!-- Already registered? Sign In link -->
                <p class="p">Already registered? <a class="span" href="{{ route('login') }}">Sign In</a></p>
            </form>
        </div>
    </div>

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>