<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <style>
        /* public/css/dashboard.css */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            color: #666;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        p {
            color: #333;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>

    <div class="container">
        <h1>Welcome, {{ $user->name }}</h1>
        <h2>Your Earnings:</h2>
        <p>Total Earnings: Rs : {{ $user->earnings }}</p>
        <h2>Your Messages:</h2>
        <ul>
            @foreach ($user->messages as $message)
                <li>{{ $message->content }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>
