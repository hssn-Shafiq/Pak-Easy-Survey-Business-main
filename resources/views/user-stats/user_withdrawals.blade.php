<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 1rem;
        background-color: transparent;
        color: #212529;
    }

    th,
    td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #f8f9fa;
    }

    tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .card {
        margin-bottom: 1rem;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-body {
        padding: 1.5rem;
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Withdrawals</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userWithdrawals as $withdrawal)
                                    <tr>
                                        <td>{{ $withdrawal->created_at }}</td>
                                        <td>{{ $withdrawal->amount }}</td>
                                        <td>{{ $withdrawal->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
