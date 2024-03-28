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

    <div class=" reg-header p-3">


        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-4 backlink ">
                    <a href="#" onclick="history.back()" class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-angles-left"></i>
                        <span>Return to EasyBusiness</span></a>
                </div>
                <div class="col-12 col-lg-4 text-center">
                    <a href="#"><img src="/assets/images/ebslogo.png" alt="" width="170px"
                            style="filter: drop-shadow(2px 4px 6px black);"></a>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

    </div>
    <div class="reg-form d-flex align-items-center justify-content-center mt-5">
        <form class="registration-form" method="POST" action="{{ route('login') }}">
            <h3 class="text-center title">SignIn Now</h3>
            @csrf

            <!-- Email -->
            <div class="flex-column">
                <label for="email">Email</label>
            </div>
            <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20">
                    <path
                        d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z" />
                </svg>
                <input placeholder="Enter your Email" class="input" type="email" name="email"
                    :value="old('email')" required autocomplete="email">
            </div>
            @error('email')
                <p class="error text-danger mb-0">{{ $message }}</p>
            @enderror
            <!-- Password -->
            <div class="flex-column">
                <label for="password">Password</label>
            </div>
            <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20">
                    <path
                        d="M336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                    </path>
                    <path
                        d="M304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                    </path>
                </svg>
                <input placeholder="Enter your Password" class="input" type="password" name="password" required
                    autocomplete="current-password" :value="__('Password')">
            </div>
            @error('password')
                <p class="error text-danger mb-0">{{ $message }}</p>
            @enderror



            <!-- Submit Button -->
            <button type="submit" class="button-submit">{{ __('Log in') }}</button>

            <!-- Already registered? Sign In link -->
            <p class="p">don't have an account? <a class="span" href="{{ route('register') }}">Register Now</a>
            </p>
            @if (Route::has('password.request'))
                <a class="span" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </form>

    </div>

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


{{-- <form method="POST" action="{{ route('password.send') }}">
    @csrf
    <button type="submit" class="btn btn-link">Reset Password</button>
</form> --}}

