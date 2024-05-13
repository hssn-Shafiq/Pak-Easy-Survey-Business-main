<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Rewards | Pak Easy Business Survey</title>
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
                        <a href="#"><img src="/assets/images/ebslogo.png" alt="" width="170px"
                                style="filter: drop-shadow(2px 4px 6px black);"></a>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>


        </div>
        <div class="reg-form d-flex align-items-center justify-content-center mt-5">
            <form class="registration-form" method="POST" action="{{ route('admin.send-earning.submit') }}">
            <h3 class="text-center title">Send Rewards</h3>
                <div class="registration-fee text-center">
                    <p class="mb-0 main-heading">Appreciate your users by sending rewards to them.</p>
                </div>
            @csrf
                <!-- USER ID -->
                <div class="flex-column">
                    <label for="user_id">User ID*</label>
                </div>
                <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M20 5h2v14h-2V5zM2 11h2v8H2v-8zm4-4h2v12H6V7zm4 8h2v4h-2v-4zm4-8h2v12h-2V7z" />
                    </svg>
                    <input placeholder="Enter User ID" class="input" type="text" id="user_id" name="user_id" autofocus required autocomplete="user_id">
                </div>
                 <!-- User Name -->
                 <div class="flex-column">
                    <label for="user_name">User Name*</label>
                </div>
                <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path
                            d="M18 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 18H6V10h12v10zm-6-2H8v-2h4v2zm0-4H8v-2h4v2zm0-4H8V8h4v2zm6 8h-2v-2h2v2zm0-4h-2V9h2v2z" />
                    </svg>
                    <input placeholder="User Name auto" class="input" type="text" id="user_name" name="user_name" autofocus required readonly autocomplete="user_name">
                </div>
                <!-- Amount -->
               <div class="flex-column">
                    <label for="amount">Amount*</label>
                </div>
                <div class="inputForm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M21 9V5H3v4H0v11h24V9h-3zM5 7h14v2H5V7zm14 10H5v-4h14v4zm0-6H5V9h14v2z" />
                    </svg>
                    <input placeholder="Enter Amount to Send" class="input" type="text" id="amount" name="amount" autofocus required  autocomplete="amount">
                </div>

                <!-- Greet Message -->
                <div class="flex-column">
                    <label for="bank_username">Enter a Greet Messege*</label>
                </div>
                <div class="inputForm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path
                            d="M18 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 18H6V10h12v10zm-6-2H8v-2h4v2zm0-4H8v-2h4v2zm0-4H8V8h4v2zm6 8h-2v-2h2v2zm0-4h-2V9h2v2z" />
                    </svg>
                    <textarea class="input pt-2" id="message" name="message" rows="3" placeholder="Here is the reward for you. Keep going one."></textarea>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="button-submit">Send Reward</button>
            </form>
        </div>
    </div>

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    document.getElementById('user_id').addEventListener('change', function() {
        var userId = this.value;
        fetch('/admin/get-user/' + userId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('user_name').value = data.name;
            });
    });
</script>
</html>


