<?php
  $i = -1;  
  if (_CURR_TARGET !== "") {
    foreach ($data['users'] as $key => $user) {
      if ($user['url'] === _CURR_TARGET) {
        $i = $key;  
        break;
      } 
    }
    if ($i >= 0) {
      $user = $data['users'][$i];
?>


<!-- MAIN PAGE CONTENT IN HERE -->
<div class="container container-medium text-left">
  <div class="row mt-2">
    <div class="col">
      <a href="<?php echo _ROOT_FOLDER ?>#gallery.php" class="plain">
        <i class="far fa-arrow-left mr-2"></i>Back to gallery
      </a>
    </div><!-- col -->
  </div><!-- row -->


  <div class="row mt-3">
    <div class="col text-center title-fancy">
      <h1 class="mb-0 py-0 text-capitalize"><?php echo $user['name'];?>'s Profile</h1>
    </div><!-- col -->
  </div><!-- row -->

  <?php
    $gallery_location ='assets/user/'.$user['id'].'/';
    if (file_exists($gallery_location)) {
      $images = array_values(array_diff(scandir($gallery_location), array('..', '.')));
      if ($images) {
        $total = count($images);
        echo '<div class="row gallery mt-4">';
        $i = 0;
        foreach ($images as $image) {
          if ($i === 0) {
            echo '
            <div class="col-md-6">
              <a data-fancybox="gallery" href="../'.$gallery_location.''.$image.'">
                <div class="media-holder">
                  <img src="../'.$gallery_location.''.$image.'" alt="">
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-0">
              <div class="row gallery mb-0">
            ';
          } elseif ($i < 5){
            echo'
                <div class="col-6">
                  <a data-fancybox="gallery" href="../'.$gallery_location.''.$image.'">
                    <div class="media-holder">
                      <img src="../'.$gallery_location.''.$image.'" alt="">
                    </div>
                  </a>
                </div>
            ';
          } elseif ($i === 5) {
            echo'
              </div>
            </div>
          </div>
          <div class="row gallery">
            <div class="col-6 col-md-3">
              <a data-fancybox="gallery" href="../'.$gallery_location.''.$image.'">
                <div class="media-holder">
                  <img src="../'.$gallery_location.''.$image.'" alt="">
                </div>
              </a>
            </div>
            ';
          } else {
            echo'
            <div class="col-6 col-md-3">
              <a data-fancybox="gallery" href="../'.$gallery_location.''.$image.'">
                <div class="media-holder">
                  <img src="../'.$gallery_location.''.$image.'" alt="">
                </div>
              </a>
            </div>
          ';
          }
          $i++;
        }
          echo '</div>';
          if ($total < 6) {echo '</div></div>';}
      } else {
        echo '<p class="text-center my-5">There are no images for this profile</p>';
      }
    } else {
      echo '<p class="text-center my-5">There is no image folder for this profile</p>';
    }
  ?>

  <div class="px-md-4 pt-4">

    <div class="row">

      <div class="col-12 col-lg-6">
        <a href="tel:01234123456">
          <div class="btn btn-wide">Call to Book<i class="fas fa-phone"></i></div>
        </a>
        <a href="sms:01234123456">
          <div class="btn btn-wide">Message to Book<i class="fas fa-sms"></i></div>
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
        <div>

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
            foreach ($data['stats'] as $stat) {
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
        <div>
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
          echo '<p>'.$user['bio'].'</p>';
        } else {
          echo '<p>Information to follow</p>';
        } ?>
      </div>
      <div class="col-md-6 mb-4">
        <div class="title">
          <h5>Services</h5>
        </div>
        <div>
          <?php if ($user['services']) {
            $i=0;
            foreach ($data['services'] as $service) {
              if ($user['services'][$i] == 1) {
                echo'<div class="text-block invert">'.$service.'</div>';
              }
              $i++;
            }
          } else {
            echo '<p>Information to follow</p>';
          } ?>
        </div>
      </div>
    </div><!-- row -->



  </div>


</div><!-- container -->




<?php
    } else {
      echo '
        <div class="container">
          <h5 class="text-center pt-5">That person doesn&apos;t exist</h5>        
        </div>
      ';
      include 'pages/page404.php';
    }
  } else {
    echo '
    <div class="container">
      <h5 class="text-center pt-5">A name might help...</h5>        
    </div>
  ';
  include 'pages/page404.php';
  }

?>

