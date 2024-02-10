@extends('layouts.frontend')
@section('content')
  <!-- ***** Main Banner Area Start ***** -->
  <div id="top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-content">
            <div class="inner-content">
              @include('alert.messsage')
              <h4>KlassyCafe</h4>
              <h6>THE BEST EXPERIENCE</h6>
              <div class="main-white-button scroll-to-section">
                <a href="#reservation">Make A Reservation</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="main-banner header-text">
            <div class="Modern-Slider">
              <!-- Item -->
              <div class="item">
                <div class="img-fill">
                  <img src="frontend/assets/images/slide-01.jpg" alt="">
                </div>
              </div>
              <!-- // Item -->
              <!-- Item -->
              <div class="item">
                <div class="img-fill">
                  <img src="frontend/assets/images/slide-02.jpg" alt="">
                </div>
              </div>
              <!-- // Item -->
              <!-- Item -->
              <div class="item">
                <div class="img-fill">
                  <img src="frontend/assets/images/slide-03.jpg" alt="">
                </div>
              </div>
              <!-- // Item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  <!-- ***** Menu Area Starts ***** -->
  @include('frontend.menu_meal')
  <!-- ***** Menu Area Ends ***** -->



  <!-- ***** cake Area Starts ***** -->
  @include('frontend.menu_cake')
  <!-- ***** cake Area Ends ***** -->

  <!-- ***** Chefs Area Starts ***** -->
  @include('frontend.chefs')
  <!-- ***** Chefs Area Ends ***** -->

  <!-- ***** Reservation Us Area Starts ***** -->
  <section class="section" id="reservation">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-text-content">
            <div class="section-heading">
              <h6>Contact Us</h6>
              <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
            </div>
            <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna
              diam, sed commodo purus porta ut.</p>
            <div class="row">
              <div class="col-lg-6">
                <div class="phone">
                  <i class="fa fa-phone"></i>
                  <h4>Phone Numbers</h4>
                  <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="message">
                  <i class="fa fa-envelope"></i>
                  <h4>Emails</h4>
                  <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('frontend.reservation')
      </div>
    </div>
  </section>
  <!-- ***** Reservation Area Ends ***** -->
  <!-- ***** About Area Starts ***** -->
  <section class="section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="left-text-content">
            <div class="section-heading">
              <h6>About Us</h6>
              <h2>We Leave A Delicious Memory For You</h2>
            </div>
            <p>Klassy Cafe is one of the best <a href="https://templatemo.com/tag/restaurant" target="_blank"
                rel="sponsored">restaurant HTML templates</a> with Bootstrap v4.5.2 CSS framework. You can download and
              feel free to use this website template layout for your restaurant business. You are allowed to use this
              template for commercial purposes. <br><br>You are NOT allowed to redistribute the template ZIP file on any
              template donwnload website. Please contact us for more information.</p>
            <div class="row">
              <div class="col-4">
                <img src="frontend/assets/images/about-thumb-01.jpg" alt="">
              </div>
              <div class="col-4">
                <img src="frontend/assets/images/about-thumb-02.jpg" alt="">
              </div>
              <div class="col-4">
                <img src="frontend/assets/images/about-thumb-03.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="right-content">
            <div class="thumb">
              <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
              <img src="frontend/assets/images/about-video-bg.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** About Area Ends ***** -->
@endsection
