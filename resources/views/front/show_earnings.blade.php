<!-- resources/views/admin/gifted_users.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gifted Users</title>
    <!-- Add your CSS and other dependencies here -->
</head>

<body>

    <h1>Users Who Have Given Gifts:</h1>
    <ul>
        @foreach ($giftedUsers as $user)
            <li>{{ $user->name }} - Gift Amount: Rs{{ $user->gift }}</li>
        @endforeach
    </ul>

</body>

</html>
