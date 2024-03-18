<!-- Add this in your HTML file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Custom CSS for table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .status-approved {
        color: green;
    }

    .status-rejected {
        color: red;
    }

    .status-waiting {
        color: orange;
    }
</style>

<!-- Your table code -->
<table class="table">
    <thead>
        <tr>
            <th>Bank</th>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Withdrawal Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userWithdrawals as $withdrawal)
            <tr>
                <td>{{ $withdrawal->bank }}</td>
                <td>{{ $withdrawal->account_number }}</td>
                <td>{{ $withdrawal->account_name }}</td>
                <td>{{ $withdrawal->amount }}</td>
                <td>
                    @if ($withdrawal->status === 'Approved')
                        <span class="status-approved">Approved</span>
                    @elseif ($withdrawal->status === 'Rejected')
                        <span class="status-rejected">Rejected</span>
                    @else
                        <span class="status-waiting">Waiting</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
