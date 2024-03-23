<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PakEasyBusinesSurvey- A Merging Platform to Earn Through Surveys and Referrals</title>

    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">

    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container-fluid overflow-hidden products-section px-0">
        <div class="row text-center product-title p-5">
            <h1>ALL PRODUCTS</h1>
            <h6><a class="btn btn-dark" href="{{route('customer')}}">Return to Page</a></h6>
        </div>
        <div class="container">
            <div class="row p-2 pb-5">
                @foreach ($products as $product)
                @php
                $review = $product
                ->reviews()
                ->where('user_id', $user->id)
                ->latest()
                ->first();
                $reviewTime = now()->subHours(24);
                $timeRemaining = $review ? max(0, $review->created_at->addHours(24)->diffInSeconds(now())) : 0;
                @endphp

                <div class="col-12 col-lg-4 my-4">
                    <div class="product-grid text-center my-1">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img src="{{ asset($product->image_url) }}">
                            </a>
                            @if ($timeRemaining == 0)
                            <a href="#" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">
                                Review
                            </a>
                            @else
                            <button type="button" class="add-to-cart" disabled>
                                Review in: <span id="timer{{ $product->id }}"></span>
                            </button>
                            <script>
                                // Set the date we're counting down to
                                var countDownDate = new Date("{{ now()->addSeconds($timeRemaining)->format('M d, Y H:i:s') }}").getTime();

                                // Update the count down every 1 second
                                var x = setInterval(function() {

                                    // Get the current date and time
                                    var now = new Date().getTime();

                                    // Find the distance between now and the count down date
                                    var distance = countDownDate - now;

                                    // If the count down is over, enable the button and show "Review"
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("timer{{ $product->id }}").innerHTML = "";
                                        document.querySelector("#exampleModal{{ $product->id }} .add-to-cart").removeAttribute("disabled");
                                        document.querySelector("#exampleModal{{ $product->id }} .add-to-cart").innerText = "Review";
                                    } else {
                                        // Calculate the remaining hours, minutes, and seconds
                                        var totalHours = Math.floor(distance / (1000 * 60 * 60));
                                        var hours = totalHours % 24;
                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        // Display the remaining time
                                        document.getElementById("timer{{ $product->id }}").innerHTML = hours + "h " + minutes + "m " + seconds + "s";
                                    }
                                }, 1000);
                            </script>


                            @endif
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                            <div class="price">{{ $product->description }}</div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($products as $product)
    <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{ $product->id }}">Submit Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('products.review.store', ['product' => $product->id]) }}">
                        @csrf

                        <div class="form-group">
                            <label class="pb-2"><b>Is our product costly?</b></label>
                            <select id="cost" class="form-select"required>
                                <option value="">Select...</option>
                                <option value="1">Costly</option>
                                <option value="2">Cheapest</option>
                                <option value="3">Fair</option>
                            </select>
                            @error('cost')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label  class="pb-2"><b>How would you rate our product?</b></label>
                            <select id="rating" class="form-select "required>
                                <option value="">Select...</option>
                                <option value="1">Bad</option>
                                <option value="2">Good</option>
                                <option value="3">Great</option>
                            </select>
                            @error('rating')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="review" class="pb-2"><b>Write a Review</b></label>
                            <textarea id="review" class="form-control @error('review') is-invalid @enderror" name="review" rows="2" required>{{ old('review') }}</textarea>
                            @error('review')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endforeach

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>