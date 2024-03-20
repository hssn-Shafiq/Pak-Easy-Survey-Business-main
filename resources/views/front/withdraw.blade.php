<!-- Add this in your HTML file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Custom CSS for form */
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button[type="submit"] {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<!-- Your form code -->
<form action="{{ route('withdrawals.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="bank">Select Bank:</label>
        <select class="form-control" id="bank" name="bank">
            <option value="jazzcash">JazzCash</option>
            <option value="easypaisa">EasyPaisa</option>
        </select>
    </div>
    <div class="form-group">
        <label for="account_number">Account Number:</label>
        <input type="text" class="form-control" id="account_number" name="account_number">
    </div>
    <div class="form-group">
        <label for="account_name">Account Name:</label>
        <input type="text" class="form-control" id="account_name" name="account_name">
    </div>
    <div class="form-group">
        <label for="amount">Withdrawal Amount:</label>
        <input type="text" class="form-control" id="amount" name="amount">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
