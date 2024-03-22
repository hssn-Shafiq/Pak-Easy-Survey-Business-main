<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product- Pak Easy Business Survey</title>

    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<!-- Navigation -->
<nav>
  <div class="reg-header p-3">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-12 col-lg-4 backlink">
          <a href="#" onclick="history.back()" class="text-dark d-flex align-items-center gap-3 text-decoration-none">
            <h5><i class="fa-solid fa-angles-left ms-3"></i></h5>
            <h5>Return to Page</h5>
          </a>
        </div>
        <div class="col-12 col-lg-4 text-center">
          <a href="#"><img src="/assets/images/ebslogo.png" alt="" width="170px"></a>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
  </div>
</nav>

<main class="content my-4">
    <div class="container">
        <h1 class="text-center title">Create Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-dark">Create Product</button>
        </form>
    </div>
    </main>

    <footer class="footer copyright">
  <span>© All Right Reserved <a href="/">EasyBusinessSurvey.Com</a></span>
</footer>
    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
