{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        <h1>Rejected Withdrawals</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
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
{{-- @endsection --}}
