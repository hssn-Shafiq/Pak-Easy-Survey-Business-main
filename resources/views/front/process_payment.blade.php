

<!-- Approval Status Section -->
<h2>Users Approval Status:</h2>

<table class="table">
    <thead>
        <tr>
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
                        <span class="pending">Pending</span>
                    @elseif ($user->admin_approvel_status === 'Approved')
                        <span class="approved">Approved</span>
                    {{-- @elseif ($user->admin_approvel_status === 'Rejected')
                        <span class="rejected">Rejected</span> --}}
                    @endif
                </td>
                <td>
                    @if ($user->admin_approvel_status === 'Pending')
                        <form action="{{ route('admin.approve', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        {{-- <form action="{{ route('admin.reject', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form> --}}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    .pending {
        color: orange;
        font-weight: bold;
    }

    .approved {
        color: green;
        font-weight: bold;
    }

    .rejected {
        color: red;
        font-weight: bold;
    }

    .btn {
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn-success {
        background-color: green;
        color: white;
        border: none;
    }

    .btn-danger {
        background-color: red;
        color: white;
        border: none;
    }
</style>
