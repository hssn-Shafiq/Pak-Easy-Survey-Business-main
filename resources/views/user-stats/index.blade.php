<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">

    <title>1st Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user-stats.index')}}">Affiliate</a>
                    </li>

                </ul>
                <div class="d-flex">
                    <a class="nav-link" href="{{route('login')}}">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>

    <main>

        <div class="mt-3 p-5">
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
                                {{ $userStat->reviews()->count() * 10 }}
                            </td>
                            <td>
                                {{ $userStat->earnings + $userStat->reviews()->count() * 10 }}
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
        <span>©All Right Reserved <a href="#">EasyBusinessSurvey.Com</a></span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>