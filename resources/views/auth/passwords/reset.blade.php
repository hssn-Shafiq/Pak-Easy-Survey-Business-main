<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Pak Easy Business Survey</title>

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
                        <span>Return to EasyBusiness</span>
                    </a>
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
        <form class="registration-form" method="POST" action="{{ route('password.reset', $token) }}">
            <h3 class="text-center title">Reset Password</h3>
            @csrf
            @error('token')
                <div class="error text-danger">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="error text-danger">{{ $message }}</div>
            @enderror

            <div class="flex-column">
                <label for="password">New Password:</label>
            </div>
            <div class="inputForm">
                <input class="input" type="password" id="password" name="password" required>
            </div>

            <div class="flex-column">
                <label for="password_confirmation">Confirm Password:</label>
            </div>
            <div class="inputForm">
                <input type="password" class="input" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="button-submit">Reset Password</button>
        </form>
    </div>

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
