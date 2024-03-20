
@extends('layouts.admin')

<!--=======Navbar Starts Here=======-->
@section('title', 'Admin')

@section('content')

    <!--=======Navbar Ends Here=======-->
    <main class="content mb-5">
        <!--=======customer-dashboard-banner Starts Here=======-->
        <section id="customer-dashboard-banner">
            <div class="container-fluid p-5  rounded cust-banner-main">
                <h1 class="text-light">Welcome To Dashboard</h1>
                <p class="text-light">Manage All Your Earnings Here</p>
                <div class="row bg-transparent" id="D-container">
                    <div class="col-md-4 bg-light" id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (5).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class="text-bold pt-4 ">
                            <p>New User Approval</p>
                        </h3>
                        <a href="{{ route('process.payment') }}" class="text-decoration-none text-dark">
                            <p>Approved Now</p>
                        </a>
                    </div>
                    <div class="col-md-4 bg-light" id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (3).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class="text-bold py-3">Withdrawal Request</h3>
                        <a href="{{ route('admin.withdrawals.index') }}" class="text-decoration-none text-dark">
                            <p>Check Now</p>
                        </a>
                    </div>
                    <div class="col-md-4 bg-light" id="dollar" style="width: 350px !important;">
                        <img src="/assets/images/Vector (10).png" alt="" class="img-fluid" class="img-fluid" width="60">
                        <h3 class=" py-3">Approved Withdraw: </h3>
                        <a href="{{ route('approved-withdrawals') }}" class="text-decoration-none text-dark">
                            <p>Take A Look</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
