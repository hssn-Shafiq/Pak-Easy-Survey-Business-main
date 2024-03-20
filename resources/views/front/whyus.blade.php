<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Why Us - Pak Easy Business Survey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
  <style>
    /* Add your custom CSS styles here */
    .jumbotron {
      background-image: url('assets/images/bg.png');
      background-size: cover;
      background-position: bottom;
      color: white;
      text-align: center;
    }
    .team-member {
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<!-- Navigation -->
<nav>
        <div class=" reg-header p-3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-4 backlink ">
                        <a href="#" onclick="history.back()" class=" text-dark d-flex align-items-center gap-3 text-decoration-none">
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

    <main>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">About Us</h1>
    <p class="lead">Learn more about Pak Easy Business Survey and our team.</p>
  </div>
</div>

<!-- Team Section -->
<section class="container">
  <h2 class="text-center mb-5">Meet Our Team</h2>
  <div class="row">
    <!-- Team Member 1 -->
    <div class="col-lg-4">
      <div class="team-member">
        <img src="team-member1.jpg" class="img-fluid rounded-circle mb-3" alt="Team Member 1">
        <h3>John Doe</h3>
        <p class="text-muted">CEO & Founder</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-lg-4">
      <div class="team-member">
        <img src="team-member2.jpg" class="img-fluid rounded-circle mb-3" alt="Team Member 2">
        <h3>Jane Smith</h3>
        <p class="text-muted">Marketing Director</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
    <!-- Team Member 3 -->
    <div class="col-lg-4">
      <div class="team-member">
        <img src="team-member3.jpg" class="img-fluid rounded-circle mb-3" alt="Team Member 3">
        <h3>Michael Johnson</h3>
        <p class="text-muted">Technical Lead</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    </div>
  </div>
</section>
    </main>


    <footer class="footer copyright">
        <span>©All Right Reserved <a href="#">EasyBusinessSurvey.Com</a></span>
    </footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
