<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PakEasyBusinesSurvey- A Merging Platform to Earn Through Surveys and Referrals</title>
</head>

<body>
    <nav>
        <div class=" reg-header p-3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-4 backlink ">
                        <a href="#" onclick="history.back()" class=" text-dark d-flex align-items-center gap-3 text-decoration-none">
                            <h5><i class="fa-solid fa-angles-left ms-3"></i></h5>
                            <h5>Return to Dashboard</h5>
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
    <main class="content">
        <div class="mt-3 p-5">
            <div class="title text-center">
                <h1>Accept Possible Withdrawal Request:</h1>
                <p class="text-secondary">(Please Check the Pending Withdrawal Requests.)</p>
            </div>
            <div style="overflow-x: auto;" class="mt-4">
                <table class="user-stat-table">
                    <thead class=" --primary-color ">
                        <tr class="text-light">
                            <th>Account Number</th>
                            <th>Account Name</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                        <tr>

                            <td>{{ $withdrawal->bank }}</td>
                            <td>{{ $withdrawal->account_number }}</td>
                            <td>{{ $withdrawal->account_name }}</td>
                            <td>{{ $withdrawal->amount }}</td>
                            <td style="display: flex; text-align:center">
                                <form action="{{ route('admin.withdrawals.approve', $withdrawal->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.withdrawals.reject', $withdrawal->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- Approval Status Section -->

    <footer class="footer copyright">
        <span>©All Right Reserved <a href="/">EasyBusinessSurvey.Com</a></span>
    </footer>
</body>
</html>