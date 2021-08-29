<!DOCTYPE html>
<html>

<head>
  <title>Big store a Ecommerce Online Shopping</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta property="og:title" content="Vide" />
  <meta name="keywords" content="Big store Responsive web template, " />
  <script type="application/x-javascript">
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //for-mobile-apps -->
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <!-- Custom Theme files -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <!-- js -->
  <script src="js/jquery-1.11.1.min.js"></script>
  <!-- //js -->
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <!--- start-rate---->
  <script src="js/jstarbox.js"></script>
  <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
  <script type="text/javascript">
    jQuery(function () {
      jQuery('.starbox').each(function () {
        var starbox = jQuery(this);
        starbox.starbox({
          average: starbox.attr('data-start-value'),
          changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' :
            true,
          ghosting: starbox.hasClass('ghosting'),
          autoUpdateAverage: starbox.hasClass('autoupdate'),
          buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
          stars: starbox.attr('data-star-count') || 5
        }).bind('starbox-value-changed', function (event, value) {
          if (starbox.hasClass('random')) {
            var val = Math.random();
            starbox.next().text(' ' + val);
            return val;
          }
        })
      });
    });
  </script>
  <!---//End-rate---->

  <!---->

  <style type="text/css">
    .form-group {
      margin-bottom: 15px;
    }

    label {
      margin-bottom: 15px;
    }

    input,
    input::-webkit-input-placeholder {
      font-size: 11px;
      padding-top: 3px;
    }

    .main-login {
      background-color: #fff;
      /* shadows and rounded borders */
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

    }

    .main-center {
      margin-top: 30px;
      margin: 0 auto;
      max-width: 330px;
      padding: 40px 40px;

    }

    .login-button {
      margin-top: 5px;
    }

    .login-register {
      font-size: 11px;
      text-align: center;
    }

    .nav-top {
      position: relative;
      padding: 0px;
      top: 0px;
      background: #3b5998;
      color: #fff;
    }

    .navbar-default .navbar-nav>li>a {
      color: #fab005;
    }
  </style>
  <!---->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>

<body>
  <!-- <a href="offer.html"><img src="images/download.png" class="img-head" alt=""></a> -->
  <!--header -->
  <?php include 'header.php';?>
  <!-- //header -->


  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')
  </script>
  <script src="js/jquery.vide.min.js"></script>


  <!-- Slider Banner -->

  <!--content-->
  <div class="content-top ">
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Check your email for OTP </h3>
          </div>
          <div class="panel-body">
            <form role="form" action="login-process.php?case=otp" method="POST">
              <?php
                  if (isset($_GET['m'])) {
                      echo "<p style='color:red;padding:0px;'>OTP is un-valid</p>";
                  }
                  ?>
              <div class="form-group">
                <input type="number" name="otp" id="otp" class="form-control input-sm" placeholder="OTP">
              </div>

              <input type="submit" value="Login" id="btn" class="btn btn-info btn-block">
              <p>Don't get Any OTP.Please <a href="login-process.php?case=resend">Resend</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Branded Slider -->
  <!--footer-->
  <?php include 'footer.php';?>
  <!-- //footer-->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


  <!-- smooth scrolling -->
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>
  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  <!-- //smooth scrolling -->
  <!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
  <!-- //for bootstrap working -->
  <script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
    $(function () {

      var goToCartIcon = function ($addTocartBtn) {
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
          "position": "fixed",
          "z-index": "999"
        });
        $addTocartBtn.prepend($image);
        var position = $cartIcon.position();
        $image.animate({
          top: position.top,
          left: position.left
        }, 500, "linear", function () {
          $image.remove();
        });
      }

      $('.my-cart-btn').myCart({
        classCartIcon: 'my-cart-icon',
        classCartBadge: 'my-cart-badge',
        affixCartIcon: true,
        checkoutCart: function (products) {
          $.each(products, function () {
            console.log(this);
          });
        },
        clickOnAddToCart: function ($addTocart) {
          goToCartIcon($addTocart);
        },
        getDiscountPrice: function (products) {
          var total = 0;
          $.each(products, function () {
            total += this.quantity * this.price;
          });
          return total * 1;
        }
      });

    });
  </script>

  <!-- product -->
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-info">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body modal-spa">
          <div class="col-md-5 span-2">
            <div class="item">
              <img src="images/lip.png" class="img-responsive" alt="">
            </div>
          </div>
          <div class="col-md-7 span-1 ">
            <h3>Golden lipstick(10 gm)</h3>
            <p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
            <div class="price_single">
              <span class="reducedfrom "><del>Rs.2.00</del>Rs.1.50</span>

              <div class="clearfix"></div>
            </div>
            <h4 class="quick">Quick Overview:</h4>
            <p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id
              quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
            <div class="add-to">
              <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="1" data-name="Moong"
                data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/lip.png">Add to
                Cart</button>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
  </div>
  <!-- product -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-info">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body modal-spa">
          <div class="col-md-5 span-2">
            <div class="item">
              <img src="images/lip2.jpg" class="img-responsive" alt="">
            </div>
          </div>
          <div class="col-md-7 span-1 ">
            <h3>Red lipstick(15 gm)</h3>
            <p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
            <div class="price_single">
              <span class="reducedfrom "><del>Rs.10.00</del>Rs.9.00</span>

              <div class="clearfix"></div>
            </div>
            <h4 class="quick">Quick Overview:</h4>
            <p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id
              quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
            <div class="add-to">
              <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="2" data-name="Sunflower Oil"
                data-summary="summary 2" data-price="9.00" data-quantity="1" data-image="images/lip2.jpg">Add to
                Cart</button>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
  </div>
  <!-- product -->
  </div>
</body>
<!--slider banner JS  -->
<script>
  $(document).ready(function () {
    // invoke the carousel
    $('#myCarousel').carousel({
      interval: 6000
    });

    // scroll slides on mouse scroll 
    $('#myCarousel').bind('mousewheel DOMMouseScroll', function (e) {

      if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
        $(this).carousel('prev');


      } else {
        $(this).carousel('next');

      }
    });

    //scroll slides on swipe for touch enabled devices 

    $("#myCarousel").on("touchstart", function (event) {

      var yClick = event.originalEvent.touches[0].pageY;
      $(this).one("touchmove", function (event) {

        var yMove = event.originalEvent.touches[0].pageY;
        if (Math.floor(yClick - yMove) > 1) {
          $(".carousel").carousel('next');
        } else if (Math.floor(yClick - yMove) < -1) {
          $(".carousel").carousel('prev');
        }
      });
      $(".carousel").on("touchend", function () {
        $(this).off("touchmove");
      });
    });

  });
  //animated  carousel start
  $(document).ready(function () {

    //to add  start animation on load for first slide 
    $(function () {
      $.fn.extend({
        animateCss: function (animationName) {
          var animationEnd =
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          this.addClass('animated ' + animationName).one(animationEnd, function () {
            $(this).removeClass(animationName);
          });
        }
      });
      $('.item1.active img').animateCss('slideInDown');
      $('.item1.active h2').animateCss('zoomIn');
      $('.item1.active p').animateCss('fadeIn');

    });

    //to start animation on  mousescroll , click and swipe



    $("#myCarousel").on('slide.bs.carousel', function () {
      $.fn.extend({
        animateCss: function (animationName) {
          var animationEnd =
            'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          this.addClass('animated ' + animationName).one(animationEnd, function () {
            $(this).removeClass(animationName);
          });
        }
      });

      // add animation type  from animate.css on the element which you want to animate

      $('.item1 img').animateCss('slideInDown');
      $('.item1 h2').animateCss('zoomIn');
      $('.item1 p').animateCss('fadeIn');

      $('.item2 img').animateCss('zoomIn');
      $('.item2 h2').animateCss('swing');
      $('.item2 p').animateCss('fadeIn');

      $('.item3 img').animateCss('fadeInLeft');
      $('.item3 h2').animateCss('fadeInDown');
      $('.item3 p').animateCss('fadeIn');
    });
  });
</script>

</html>