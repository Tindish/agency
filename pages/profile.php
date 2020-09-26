

<?php //echo '_CURR_TARGET is '._CURR_TARGET.'</br>';?>

<?php if (_CURR_TARGET !== ""): ?>

  <?php //echo 'target is not empty</br>';?>

  <?php 



    $key = array_search('cristina-1', array_column($data['users'], 'url'));
    var_dump($key);die();

    if ($key !== false):

?>
      

    <div class="container py-5">
      <h1><?php echo $data['users'][$key]['name'];?>'s Profile</h1>
    </div>

    <?php else: ?>
      <?php 
        echo 'index was false</br>';
        include 'pages/page404.php';
      ?>
    <?php endif ?>

  <?php else: ?>
  <?php
     include 'pages/page404.php';
  ?>
<?php endif; ?>






<?php /*

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



  </div>


</div><!-- container -->

*/ ?>

