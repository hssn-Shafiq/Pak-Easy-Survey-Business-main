<!DOCTYPE html>
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

    <title>All Registered Users- Pak Easy Business Survey</title>

    <style>
        .btn {
            font-size: 13px !important;
            padding: 5px;
        }
    </style>
</head>

<body>
    <nav>
        <div class=" reg-header p-3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-4 backlink ">

                        <div class="d-flex align-items-center gap-2">
                            <h5><i class="fa-solid fa-angles-left ms-3"></i></h5>
                            <a class=" text-dark d-flex align-items-center gap-3 text-decoration-none" href="{{ route('admin') }}">
                                <h5>Return to Dashboard</h5>
                            </a>
                        </div>
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
  <!--=======customer-dashboard-banner Starts Here=======-->
  <section id="customer-dashboard-banner" class="pb-5">
            <div class="container-fluid p-5  rounded cust-banner-main">
                <h1 class="text-light">Welcome Mohsin😍</h1>
                <p class="text-light">Manage All Your User's Here</p>
                <div class="row bg-transparent" id="D-container">
                    <div class="col-md-4 bg-light" id="dollar">
                    <img src="/assets/images/Vector (1).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class="text-bold pt-4 ">
                            <p>Send Gifts</p>
                        </h3>
                        <p><a href="{{ route('admin.send-earning') }}">Check Now</a></p>
                    </div>
                    <div class="col-md-4 bg-light" id="dollar">
                    <img src="/assets/images/Vector (10).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class="text-bold pt-4 ">
                            <p>Gifted Users</p>
                        </h3>
                        <a href="{{ route('admin.giftedUsers') }}" class="text-decoration-none text-dark">
                            <p>Check Now</p>
                        </a>
                         
                    </div>
                </div>
            </div>
        </section>
        <!--=======customer-dashboard-banner Ends Here=======-->
      
        <div class="container py-3 mt-5">
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 p-0 d-flex  justify-content-around">
                    <h4 class="text-secondary">Search Users</h4>
                    <form action="{{ route('index') }}" method="GET" class="w-50">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="px-5">
            <div class="title text-center">
                <h1>User Stats</h1>
            </div>
            <div style="overflow-x: auto;" class="mt-4">
                <table class="user-stat-table">
                    <thead class=" --primary-color ">
                        <tr class="text-light">
                            <th>
                                User ID</th>
                            <th>
                                Referring User</th>
                            <th>
                                Referral Earnings</th>
                            <th>
                                Review Earnings</th>
                            <th>
                                Total Earnings</th>
                            <th>
                                Level</th>
                            <th>
                                Total Referrals</th>
                            <th>
                                Registration Date </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userStats as $userStat)
                        <tr>
                            <td>{{ $userStat->user_id }}</td>
                            <td>{{ $userStat->user->name }}</td>
                            <td>{{ $userStat->earnings }}</td>
                            <td>
                                {{ $userStat->user->earnings }}
                            </td>
                            <td>
                                {{$userStat->earnings + $userStat->user->earnings }} 
                            </td>
                            <td>{{ $userStat->level }}</td>
                            <td>{{ $userStat->total_referrals }}
                            <td>{{ $userStat->created_at->format('Y-m-d') }}</td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="footer copyright">
        <span>©All Right Reserved <a href="/">EasyBusinessSurvey.Com</a></span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>