<form method="POST" action="{{ route('admin.send-earning.submit') }}">
    @csrf
    <label for="user_id">User ID:</label>
    <input type="text" id="user_id" name="user_id" required>
    <label for="user_name">User Name:</label>
    <input type="text" id="user_name" name="user_name" readonly>
    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" required>
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Send Earning</button>
</form>

<script>
    document.getElementById('user_id').addEventListener('change', function() {
        var userId = this.value;
        fetch('/admin/get-user/' + userId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('user_name').value = data.name;
            });
    });
</script>
