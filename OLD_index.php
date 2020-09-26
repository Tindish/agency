<?php include 'includes/header.php';?>


<div class="container container-medium text-center">

  <div class="row">
    <div class="col-12 my-3">
      <h3>Latest Models</h3>
    </div><!-- col -->
  </div>
  <div id="sliderHomepage" class="gallery pb-4">
    <?php
      $status = 'vip';
      $quantity = 0;
      $carousel = 1;
      include 'includes/staff.php';
    ?>
  </div>
  
  <div class="row">
    <div class="col d-flex flex-column my-5">
      <div class="mb-2">
        <h3 class=fancy>Start exploring</h3>
      </div>
      <div class="mb-4">
        <h2>What are you looking for?</h2>
      </div>
      <div class="btn-wide">
        <a href="./step1.php" class="btn animation-order-1 reveal reveal-down">Book an Escort</a>
      </div>
    </div><!-- col -->
  </div><!-- row -->



</div><!-- container -->

<section class="light pb-5">
  <div class="container container-small text-center">
  <div class="row">
    <div class="col d-flex flex-column my-5">
      <div class="mb-2">
        <h3 class=fancy>It's so simple</h3>
      </div>
      <div class="mb-4">
        <h2>How does Kitty Red work?</h2>
      </div>
    </div><!-- col -->
  </div><!-- row -->
  <div class="row">
    <div class="col-md-4 d-flex flex-column px-md-5 mb-5">
      <div class="circle">
        <img class="animation-order-2" src="./img/step01.png" alt="Step 1">
      </div>
      <div class="number animation-order-3">
        01
      </div>
      <div>
        <p>Click "Book an Escort" above, and fill in your requirements to find escorts</p>
      </div>
    </div>
    <div class="col-md-4 d-flex flex-column px-md-5 mb-5">
      <div class="circle">
        <img class="animation-order-2" src="./img/step02.png" alt="Step 2">
      </div>
      <div class="number animation-order-3">
        02
      </div>
      <div>
        <p>See trusted reviews and verified ratings and place a booking.</p>
      </div>
    </div>
    <div class="col-md-4 d-flex flex-column px-md-5 mb-5">
      <div class="circle">
        <img class="animation-order-2" src="./img/step03.png" alt="Step 3">
      </div>
      <div class="number animation-order-3">
        03
      </div>
      <div>
        <p>You can rate your experience and share valuable feedback for other users to see.</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col my-2 my-md-5">
      <h1 class="mb-4">H1 Page heading</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident explicabo tempora expedita quam totam error sunt animi dignissimos? Nesciunt inventore corrupti laboriosam, a earum quas saepe perferendis tempore vero, tempora quibusdam voluptatum? Fugit consectetur recusandae illum ipsa! Dolore ipsam enim ex expedita quos vero. Aliquid dolorum dicta ducimus omnis vitae?</p>
      <div id="collapseHomepage" class="my-4 collapse">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident explicabo tempora expedita quam totam error sunt animi dignissimos? Nesciunt inventore corrupti laboriosam, a earum quas saepe perferendis tempore vero, tempora quibusdam voluptatum? Fugit consectetur recusandae illum ipsa! Dolore ipsam enim ex expedita quos vero. Aliquid dolorum dicta ducimus omnis vitae? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum possimus ipsa error, doloribus accusantium recusandae cumque delectus facilis omnis eius expedita corrupti adipisci ipsum esse officiis accusamus vel saepe! Itaque?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident explicabo tempora expedita quam totam error sunt animi dignissimos? Nesciunt inventore corrupti laboriosam, a earum quas saepe perferendis tempore vero, tempora quibusdam voluptatum? Fugit consectetur recusandae illum ipsa! Dolore ipsam enim ex expedita quos vero. Aliquid dolorum dicta ducimus omnis vitae?</p>
      </div>
      <button class="btn btn-plain readmore" data-toggle="collapse" data-target="#collapseHomepage">Read more</button>
    </div><!-- col -->
  </div><!-- row -->

</div><!-- container -->
</section>





<?php include 'includes/footer.php';?>

<script>
  //SLIDER
  
  $('#sliderHomepage').slick({
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    margin: 0,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });


</script>