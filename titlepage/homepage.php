<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>AlluraCare</title>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- Bootstrap javascripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Google api's -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,400,900|Ubuntu&display=swap" rel="stylesheet">

    <!-- Font awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- ChatBot -->
    <script>
        window.watsonAssistantChatOptions = {
            integrationID: "d65b4f69-d7db-47ae-bd3c-0813e1231996", // The ID of this integration.
            region: "eu-gb", // The region your integration is hosted in.
            serviceInstanceID: "3042df76-bb19-4cf5-9429-a192f70e5239", // The ID of your service instance.
            onLoad: function(instance) {
                instance.render();
            }
        };
        setTimeout(function() {
            const t = document.createElement('script');
            t.src = "https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
            document.head.appendChild(t);
        });
    </script>
</head>

<body>
<section class="coloured-section" id="title">

    <!-- Nav Bar -->


    <div class="container-fluid">
        <nav class="navbar  navbar-expand-md navbar-light">
            <a class="navbar-brand" href="..\homepage\homepage.php"> <img src="images/Symbol.png" width="80" height="80" class="d-inline-block align-top" alt="" loading="lazy">
                <b>Allura</b>Skin</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <div id="uu"><a class="nav-link" href="..\homepage\homepage.php"><strong>Home</strong></a></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\AlluraStudio\AlluraStudio.html"><strong>AlluraStudio</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><strong>Products</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><strong>Blogs</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\About Us\About Us.html"><strong>About Us</strong></a>
                    </li>
                    <li class="nav-item">
                        <div id="cus"><a class="nav-link" href="..\Contact Us\Contact Us.html"><strong>Contact Us</strong></a></div>
                    </li>
                    <li class="nav-item">
                        <div id="cu"><a class="nav-link" href="logout.php"><strong>Log Out</strong></a></div>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="abcd">
            <!-- Title -->

            <div class="row">
                <div class="col-lg-6">
                    <h1 class="big-heading">Healthy life with AlluraSkin</h1>
                    <p>Beauty and Wellness that works! Start getting results you deserve.</p>
                    <a href="#cards"> <button type="button" class="btn btn-info btn-lg- download-button" href="#connect"> Explore Now</button></a>
                </div>

                <!-- <div class="col-lg-6">
                  <img class="title-image" src="images/main1.PNG" alt="">
                </div> -->

            </div>
        </div>
    </div>

</section>


<!-- Card -->
<section class="white-section" id="cards">
    <div class="container-fluid">
        <img src="images/main2.PNG" alt="">
        <h3>Welcome to AlluraSkin</h3>
        <p id="para">Your online destination for the best skincare</p>
        <div class="row">
            <!-- <img src="images/main4.PNG" width=250px height=300px alt=""> -->
            <div class="col-lg-3 card-box" id="round">
                <img src="images/org1.png" class="cards-icon" alt="">
                <h3 class="cards-title">AlluraStudio</h3>
                <p>It is a symptom-based skin disease classifier.</p><br>
                <a href="C:\xampp1\htdocs\alluracare\AlluraStudio\AlluraStudio.html"><p class="click">Know more...</p></a>
                <p class="cards"></p>
            </div>
            <div class="col-lg-3 card-box" id="round">
                <img src="images/org1.png" class="cards-icon" alt="">
                <h3 class="cards-title">AlluraShop</h3>
                <p>One stop for all your skincare organic product needs.</p>
                <p class="click">Know more...</p>
                <p class="cards"></p>
            </div>
            <div class="col-lg-3 card-box" id="round">
                <img src="images/org1.png" class="cards-icon" alt="">
                <h3 class="cards-title">Lifeline</h3>
                <p>It is your own personlized 24*7 chatbot to help you with anything.</p>
                <p class="click">Know more...</p>
                <p class="cards"></p>
            </div>
            <!-- <div class="col-lg-2 card-box" id="round">
        <img src="images/org1.png" class ="cards-icon" alt="">
      <h3 class="features-title">About Us</h3>
      <p class="cards"></p>
    </div> -->
            <!-- <img src="images/main4.PNG" width=250px height=300px alt=""> -->
        </div><br><br><br>

    </div>
</section>




<h3 id="pp">Proudly presented by</h3>
<div class="sponsor">

    <img src="images/sponsor1.PNG" height=200px width=1200px alt="">
</div>


<!-- Features -->

<!-- <section  class="white-section" id="features">
<div class="container-fluid">

<div class="row">
<div class="col-lg-4 features-box">
  <i class="fas fa-check-circle features-icon fa-4x"></i>
  <h3 class="features-title">Easy to use.</h3>
  <p class="features"></p>
</div>
  <div class="col-lg-4 features-box">
    <i class="fas fa-bullseye features-icon fa-4x"></i>
  <h3 class="features-title">Elite Clientele</h3>
  <p class="features"></p>
</div>
  <div class="col-lg-4 features-box">
    <i class="fas fa-heart features-icon fa-4x"></i>
  <h3 class="features-title">Guaranteed to work.</h3>
  <p class="features"></p>
</div>
</div>

</div>   </section>-->


<!-- Testimonials -->

<section class="coloured-section" id="testimonials">
    <div id="testimonialControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner" role="listbox" style=" width:100%; height: 350px !important;">
            <div class="carousel-item active container-fluid" data-interval="6000" data-keyboard="true">
                <em>
                    <h3 class="testimonials-heading">AlluraSkin has helped me recover from acne. They predcted it correctly and prescribed some medicines which worked like a miracle.</h3>
                </em>
                <img class="testimonial-image" src="images/ch1.PNG" alt=""><br>
                <em>John</em><br>
                <em>New York</em>
            </div>

            <div class="carousel-item container-fluid" data-interval="6000" data-keyboard="true">
                <em>
                    <h3 class="testimonials-heading"> Many doctor's had problems finding out what skin problem I was having, but thanks to AlluraSkin
                        they correctly detected it and gave me suggestions too.</h3>
                </em>
                <img class="testimonial-image" src="images/ch2.PNG" alt=""><br>
                <em>Beverly</em><br>
                <em>Illinois</em>

            </div>
            <div class="carousel-item container-fluid" data-interval="6000" data-keyboard="true">
                <em>
                    <h3 class="testimonials-heading"> The products available in their shop are truly organic and effective. I have already replaced all
                        my skincare products with Allura.</h3>
                </em>
                <img class="testimonial-image" src="images/ch3.PNG" alt=""><br>
                <em>Michael</em><br>
                <em>Delhi</em>

            </div>
            <a class="carousel-control-prev" href="#testimonialControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#testimonialControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

</section>


<div class="newsletter" id="nl">
    <h3>Subscribe to Our Weekly Newsletter !!</h3><br>
    <p>Get weekly updates of our new launches, home remedies and<br> tips on protecting your skin directly in your inbox!</p><br>
    <form>
        <input type="text" id="newmail" placeholder="Email Address"> &nbsp &nbsp &nbsp
        <a href="mailto:info@allura.com">  <button type="submit" value="" id="subfor">Subscribe</button></a>
</div>




<!-- Press -->
<!--
  <section class="coloured-section" id="press">
    <img class="press-logo" src="images/techcrunch.png" alt="tc-logo">
    <img class="press-logo" src="images/tnw.png" alt="tnw-logo">
    <img class="press-logo" src="images/bizinsider.png" alt="biz-insider-logo">
    <img class="press-logo" src="images/mashable.png" alt="mashable-logo">

  </section> -->







<!-- Footer -->

<footer class="white-section" id="footer">
    <div class="container-fluid">

        <a href="https://twitter.com/" style="color:#ffffff;"><i class="footer-icon fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/" style="color:#ffffff;"><i class="footer-icon fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/?hl=en" style="color:#ffffff;"><i class="footer-icon fab fa-instagram"></i></a>

        <p>© Copyright 2020 Allura</p>
    </div>
</footer>


</body>

</html>

