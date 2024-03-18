<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
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
        background-color: #ddd;
    }

    .status-approved {
        color: green;
    }
</style>

<!-- Displaying approved withdrawal users -->
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Bank</th>
            <th>Account Number</th>
            <th>Status</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->withdrawals->first()->bank }}</td>
                <td>{{ $user->withdrawals->first()->account_number }}</td>
                <td><span class="status-approved">Approved</span></td>
                <!-- Add more columns as needed -->
            </tr>
        @endforeach
    </tbody>
</table>
