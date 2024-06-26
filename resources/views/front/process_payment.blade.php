<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">

    <title>PakEasyBusinesSurvey- A Merging Platform to Earn Through Surveys and Referrals</title>
</head>

<body>
    <nav>
        <div class="reg-header p-3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-4 backlink ">
                        <div class="d-flex align-items-center gap-2">
                            <h5><i class="fa-solid fa-angles-left ms-3"></i></h5>
                            <a class="text-dark d-flex align-items-center gap-3 text-decoration-none"
                                href="{{ route('admin') }}">
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
        <div class="mt-3 p-5">
            <div class="title text-center">
                <h1>Approve Newly Registered Users:</h1>
                <p class="text-secondary">(Approve new users to become customer of Pak Easy Business Survey)</p>
            </div>
            <div style="overflow-x: auto;" class="mt-4">
                <table class="user-stat-table">
                    <thead class="--primary-color">
                        <tr class="text-light">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bank Username</th>
                            <th>Sender Number</th>
                            <th>TRX Number</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->bank_username }}</td>
                                <td>{{ $user->sender_number }}</td>
                                <td>{{ $user->TRX_number }}</td>
                                <td>
                                    @if ($user->admin_approvel_status === 'Pending')
                                        <b><span class="pending">Pending</span></b>
                                    @elseif ($user->admin_approvel_status === 'Approved')
                                        <b><span class="approved text-success">Approved</span></b>
                                    @elseif ($user->admin_approvel_status === 'Rejected')
                                        <b class="text-danger"><span class="rejected">Rejected</span></b>
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    @if ($user->admin_approvel_status === 'Pending')
                                        <form action="{{ route('admin.approve', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>

                                        <form action="{{ route('admin.withdrawals.rejects', ['id' => $user->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    @elseif ($user->admin_approvel_status === 'Rejected')
                                        <form action="{{ route('admin.delete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
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
