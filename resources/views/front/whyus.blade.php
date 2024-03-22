<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Pak Easy Business Survey</title>

  <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* Add your custom CSS styles here */
    .jumbotron {
      /* background: black; */
      color: white;
      text-align: center;
      padding: 5rem;
      border-radius: 20px;
      margin-bottom: 3rem;

      h1{
        font-weight: 800;
        letter-spacing: 1.2px;
      }
    }
    .team-member {
      margin-bottom: 30px;
    }
  </style>
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

<main class="content">
  <!-- Jumbotron -->
  <div class="container">
  <div class="jumbotron jumbotron-fluid">
      <h1 >Welcome to Pak Easy Business Survey</h1>
      <p class="lead">Unleash your earning potential with effortless online opportunities.</p>
    </div>
  </div>

  <!-- Article Section -->
  <section class="container">
    <article>
      <h2>Introducing Pak Easy Business Survey</h2>
      <p>Are you looking to earn money online without leaving the comfort of your home? Look no further! Welcome to Pak Easy Business Survey, your gateway to effortless earning opportunities through product surveys and referrals.</p>
      <p>In today's digital age, where traditional employment can be restrictive and time-consuming, Pak Easy Business Survey offers a flexible and lucrative alternative. Whether you're a stay-at-home parent, a student looking to earn extra cash, or someone seeking financial independence, our platform caters to individuals from all walks of life.</p>
      <h3>How It Works:</h3>
      <p>Joining Pak Easy Business Survey is as simple as it gets. Once registered, you gain access to a plethora of surveys and product evaluations tailored to your interests and preferences. Companies are constantly seeking consumer feedback to enhance their products and services, and you can be a part of this process while earning money!</p>
      <h3>Earn Through Surveys:</h3>
      <p>Express your opinions, share your experiences, and get paid for it! Our platform connects you with a wide range of surveys covering diverse topics, from consumer goods to lifestyle preferences. Spend a few minutes providing valuable insights, and watch your earnings grow.</p>
      <h3>Referral Program:</h3>
      <p>Do you enjoy sharing great opportunities with friends and family? Our referral program rewards you for spreading the word about Pak Easy Business Survey. Invite others to join our platform, and earn commissions for every successful referral. The more people you bring onboard, the more you earn – it's that simple!</p>
      <h3>Why Choose Pak Easy Business Survey?</h3>
      <ul>
        <li><strong>Flexibility:</strong> Work according to your schedule, whether it's during your free time, between classes, or while watching your favorite TV show.</li>
        <li><strong>Minimum Investment Required:</strong> Say goodbye to expensive startup costs. Pak Easy Business Survey offers earning opportunities with minimum investment.</li>
        <li><strong>Unlimited Earning Potential:</strong> Your earnings are directly proportional to your efforts. With Pak Easy Business Survey, there's no cap on how much you can earn.</li>
        <li><strong>Secure and Reliable:</strong> Rest assured, your privacy and security are our top priorities. Our platform employs robust security measures to safeguard your personal information.</li>
      </ul>
      <h3>Join Us Today:</h3>
      <p>Ready to embark on your journey towards financial freedom? Join Pak Easy Business Survey today and start earning from the comfort of your home. <a href="{{route('register')}}">Register</a>  now and take the first step towards a brighter future!</p>
    </article>
  </section>
</main>

<footer class="footer copyright">
  <span>© All Right Reserved <a href="/">EasyBusinessSurvey.Com</a></span>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
