<?php include 'includes/header.php';?>

<?php
  $userid = 1;
  $user = $users[array_search($userid, array_column($users, 'id'))]; // Selecting matching user from array
?>

<div class="container container-medium text-left">

  <div class="row mt-2">
    <div class="col">
      <a href="./gallery.php" class="plain">
        <i class="far fa-arrow-left mr-2"></i>Back to search results
      </a>
    </div><!-- col -->
  </div><!-- row -->


  <div class="row border-bottom mt-3">
    <div class="col text-center">
      <h3><?php echo $user['name'] ?></h3>
    </div><!-- col -->
  </div><!-- row -->

  <?php
    $gallery_location = './img/user/'.$user['id'].'/gallery/';
    $no_images = '<p class="text-center mt-3">There are no images for this profile</p>';
    if (file_exists($gallery_location)) {
      $images = array_values(array_diff(scandir($gallery_location), array('..', '.')));
      if ($images) {
        echo '<div id="sliderProfile" class="gallery mt-4">';
        foreach($images as $image) {
          echo'
            <a data-fancybox="gallery" href="'.$gallery_location.''.$image.'">
              <div class="image-holder">
                <img src="'.$gallery_location.''.$image.'" alt="">
              </div>
            </a>
          ';
        }
        echo'</div>';
      } else {
        echo $no_images;
      }
    } else {
      echo $no_images;
    }
  ?>

  <div class="px-md-4 pt-4">

    <div class="row spaced-ends">

      <div class="col-12 col-lg-6">
        <a href="tel:01234123456">
          <div class="btn btn-wide reveal reveal-down">Call to Book<i class="fas fa-phone"></i></div>
        </a>
        <a href="sms:01234123456">
          <div class="btn btn-wide reveal reveal-down">Message to Book<i class="fas fa-sms"></i></div>
        </a>
        <a href="#" rel="nofollow">
          <div class="btn btn-wide reveal reveal-down">Visit Website<i class="fas fa-globe"></i></div>
        </a>
      </div>

      <div class="col-12 col-lg-6">
        <?php if ($user['reviews']) {
          $count = 0;
          $rating = 0;
          foreach ($user['reviews'] as $review) {
            $rating += $review['rating'];
            $count += 1;
          }
          $rating = round($rating / $count);
        ?>
        <div class="rating">
          <?php
            for ($i=1; $i < 6; $i++) { 
              if ($i <= $rating) {
                echo' <i class="fas fa-star"></i>';
              } else {
                echo' <i class="far fa-star"></i>';
              }
            }
          ?>
          <span>Based on <?php echo count($user['reviews']); ?> reviews</span>
        </div>
        <?php
          } else {
            echo '<p>No reviews yet</p>';
          }
        ?>
      </div>

    </div><!-- row -->
  </div>


  <div class="px-md-4 pt-4">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="title">
          <h5>Stats</h5>
        </div>
        <div class="px-md-4">

        <?php
          if ($user['stats']) {
            echo'
              <table class="table">
                <tr>
                  <td>Age</td>
                  <td>'.$user['age'].'</td>
                </tr>
            ';
            $i=0;
            foreach ($stats as $stat) {
              echo'
                <tr>
                  <td>'.$stat['title'].'</td>
                  <td>'.$stat['options'][$user['stats'][$i] - 1].'</td>
                </tr>
              ';
              $i++;
            }
          } else {
            echo '<p>No stats</p>';
          }
          echo'</table>';
        ?>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="title">
          <h5>Meeting Rates</h5>
        </div>
        <div class="px-md-4">
        <?php if ($user['rates']) {
          echo '
          <table class="table">
            <thead>
              <tr>
                <td>Rate</td>
                <td>Incall</td>
                <td>Outcall</td>
              </tr>
            </thead>
          ';

          $i=0;
          foreach ($user['rates'] as $rate) {
            echo'
              <tr>
                <td>'.$rate['name'].'</td>
                <td>'.$rate['rate1'].'</td>
                <td>'.$rate['rate2'].'</td>
              </tr>
            ';
            $i++;
          }
          echo '
          </table>
          ';
        } else {
          echo '<p>No rates set</p>';
        } ?>

        </div>
      </div>
    </div><!-- row -->


    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="title">
          <h5>About me</h5>
        </div>
        <?php if ($user['bio']) {
          echo '<p class="px-3 px-md-4">'.$user['bio'].'</p>';
        } else {
          echo '<p class="px-3 px-md-4">Information to follow</p>';
        } ?>
      </div>
      <div class="col-md-6 mb-4">
        <div class="title">
          <h5>Services</h5>
        </div>
        <div class="px-3 px-md-4">
          <?php if ($user['services']) {
            echo '<ul class="list list-4col">';
            $i=0;
            foreach ($services as $service) {
              if ($user['services'][$i] == 1) {
                echo'<li>'.$service.'</li>';
              }
              $i++;
            }
            echo'</ul>';
          } else {
            echo '<p>Information to follow</p>';
          } ?>
        </div>
      </div>
    </div><!-- row -->


    <div class="row">

      <div class="col-12 my-md-5">
        <div class="title">
          <h5>Reviews</h5>
        </div>
      </div>

      <?php if ($user['reviews']) {
        echo'<div class="col-12 reviews">';

        foreach ($user['reviews'] as $review) {
          echo '
            <div class="row">
              <div class="col-12">
                <img src="./img/user/'.$user['id'].'/profile.png" alt="">
                <div>
                  <div class="bold">Reviewed By '.$review['name'].'</div>
                  <div>on '.date("jS F Y",$review['date']).'</div>
                  <div class="rating">
          ';
          for ($i=1; $i < 6; $i++) { 
            if ($i <=$review['rating']) {
              echo' <i class="fas fa-star"></i>';
            } else {
              echo' <i class="far fa-star"></i>';
            }
          }
          echo '
                </div>
                </div>
              </div>
              <div class="col-12 py-3">
                <p>'.$review['content'].'</p>
              </div>
            </div>
          ';
        }
        echo'</div>';
      } ?>


      <div class="col-12 d-flex flex-column my-md-3">
        <div class="mb-4">
          <p class="text-uppercase bold">Add a Review</p>
        </div>
        <div class="mb-4">
          <form id="formReview" class="form form-review" action="form-handler.php">
            <div class="row">
              <div class="col-md-6">
                <input id="review-name" name="review-name" type="text" required class="form-control" placeholder="Name">
              </div>
              <div class="col-md-6">
                <input id="review-email" name="review-email" type="email" required class="form-control" placeholder="Email address">
              </div>
              <div class="col-md-6">
                <input id="review-date" name="review-date" type="date" required class="form-control form-control-plain" placeholder="Date of visit">
              </div>

              <div class="col-md-6 rating">
                <div class="rating-stars">
                  <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"><i class="fas fa-star"></i></label></span>
                  <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"><i class="fas fa-star"></i></label></span>
                  <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"><i class="fas fa-star"></i></label></span>
                  <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"><i class="fas fa-star"></i></label></span>
                  <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"><i class="fas fa-star"></i></label></span>
                </div>
                <span>How was your experience?</span>
              </div>
              <input id="review-rating" name="review-rating" hidden>

              <div class="col-12">
                <textarea id="review-text" name="review-text" rows="4" required class="form-control" placeholder="Write your review"></textarea>
              </div>
              <div class="col-12 text-center  ">
                <button type="submit" class="btn reveal reveal-down mt-3">Submit</button>
              </div>
              </row>
          </form>
        </div>
      </div><!-- col -->

    </div>
  </div>


  <div class="row mb-4 gallery">
    <div class="col-12">
      <div class="title">
        <h5>You may also like</h5>
      </div>
    </div>
  </div><!-- row -->

  <div id="sliderRecommended" class="gallery">
  <?php
      $status = 'vip';
      $quantity = 0; // Set as zero to show all
      $carousel = 1; // Boolean
      include 'includes/staff.php';
    ?>
  </div>

  <div class="title"></div>


</div><!-- container -->

<?php include 'includes/footer.php';?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script>

  //FORM VALIDATION
  $("#formReview").validate();

  //FORM STAR RATING
  $(".rating input:radio").attr("checked", false);
  $('.rating input').click(function() {
    $(".rating span").removeClass('checked');
    $(this).parent().addClass('checked');
  });
  $('input:radio').change(function() {
    var userRating = this.value;
    $('#review-rating').attr('value', userRating);
  });

  //SLIDER
  $('#sliderRecommended').slick({
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

    //SLIDER
    $('#sliderProfile').slick({
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