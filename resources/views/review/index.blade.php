<!DOCTYPE html>
<html>
<head>
    <title>Review List</title>
</head>
<body>
    <h1>Review List</h1>
    <ul>
        @foreach($reviews as $review)
            <li>{{ $review['product_name'] }} - {{ $review['user_name'] }} - Rating: {{ $review['rating'] }}</li>
        @endforeach
    </ul>
</body>
</html>
