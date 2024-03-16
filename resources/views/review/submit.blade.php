<form method="post" action="{{ route('review.submit') }}">
    @csrf
    <label for="product_count">Number of Products Reviewed:</label>
    <input type="number" id="product_count" name="product_count" min="1" required>
    <button type="submit">Submit</button>
</form>
