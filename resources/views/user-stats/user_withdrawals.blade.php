<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <title>User Withdrawals | Pak Easy Business Survey</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav>
            <div class=" reg-header p-3">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-lg-4 backlink ">
                            <a href="#" onclick="history.back()"
                                class=" text-dark d-flex align-items-center gap-3 text-decoration-none">
                                <h5><i class="fa-solid fa-angles-left ms-3"></i></h5>
                                <h5>Return to Page</h5>
                            </a>
                        </div>
                        <div class="col-12 col-lg-4 text-center">
                            <a href="#"><img src="/assets/images/ebslogo.png" alt="" width="170px"></a>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="content">
        <!--=======All Referrals Table Starts Here=======-->
        <section id="all_referrals_user">
            <div class="mt-5 p-5">
                <div class="title text-center">
                    <h1>Your Withdrawals</h1>
                </div>

                <div style="overflow-x: auto;" class="mt-4">
                    <table class="user-stat-table">
                        <thead class="--primary-color">
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalWithdrawalAmount = 0;
                            @endphp
                            @foreach ($userWithdrawals as $withdrawal)
                                @php
                                    $totalWithdrawalAmount += $withdrawal->amount;
                                @endphp
                                <tr>
                                    <td>{{ $withdrawal->created_at }}</td>
                                    <td>{{ $withdrawal->amount }}</td>
                                    <td>{{ $withdrawal->status }}</td>
                                </tr>
                            @endforeach
                            <div class="col-md-4  mx-auto" id="dollar">
                                <img src="assets/images/Vector (1).png" alt="">

                                <!-- Total Withdrawal Amount Section -->
                                <h3 class="text-secondary pt-3">
                                    Withdrawal Amount
                                </h3>
                                <h3 class="">Rs : {{ $totalWithdrawalAmount }}</h3>
                            </div>

                        </tbody>
                    </table>
                </div>

        </section>
        <!--=======All Referrals Table Ends Here=======-->
    </main>

    <footer class="footer copyright">
        <span>©All Right Reserved <a href="/">EasyBusinessSurvey.Com</a></span>
    </footer>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
