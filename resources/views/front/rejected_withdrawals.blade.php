<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f9f9f9;
    }
</style>

<div class="container">
    <h1>Rejected Withdrawals</h1>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Account Name</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->withdrawals()->where('status', 'Rejected')->get() as $withdrawal)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ $withdrawal->bank }}</td>
                        <td>{{ $withdrawal->account_number }}</td>
                        <td>{{ $withdrawal->account_name }}</td>
                        <td>{{ $withdrawal->amount }}</td>
                        <td>{{ $withdrawal->status }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
