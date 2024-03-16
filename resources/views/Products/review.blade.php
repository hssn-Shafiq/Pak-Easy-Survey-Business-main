<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>

    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit Review</div>

                    <div class="card-body">
                        @php
                            $hasReviewed = Auth::user()
                                ->reviews()
                                ->where('product_id', $product->id)
                                ->exists();
                        @endphp

                        @if (!$hasReviewed)
                            <form method="POST"
                                action="{{ route('products.review.store', ['product' => $product->id]) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>

                                    <div class="col-md-6">
                                        <textarea id="review" class="form-control @error('review') is-invalid @enderror" name="review" rows="4"
                                            required></textarea>

                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-warning" role="alert">
                                You have already reviewed this product.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
