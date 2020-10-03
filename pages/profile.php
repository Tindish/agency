<?php 

  // echo'<pre>';print_r($data);echo'</pre>';

  //GET REFERRED FROM INFO FOR 'Back to Gallery' LINK
  $filterby = $_GET['filterby'] ?? null;
  $show = $_GET['show'] ?? null;
  $gallery = $filterby ?? null;
  $gallery = ($show ? $gallery.'/'.$show : $gallery);
  $gallery = $gallery ?: '#gallery.php';

  //IF FILTERED BY LOCATION GET INDEX OF MATCHED LOCATION
  if ($filterby === 'location' && $show) { // location given
    foreach ($data as $key => $value) {if ($key === 'locations') {$gallery_index = $key;}}; //Get index of this filter
    foreach ($data['locations_url'] as $key => $location) {
      if ($location === $show) {
        $gallery_key = $key;
      }
    }
  }
  //IF FILTEREED BY SERVICE GET INDEX OF MATCHED SERVICE
  if ($filterby === 'service' && $show) { // service given
    foreach ($data as $key => $value) {if ($key === 'services') {$gallery_index = $key;}}; //Get index of this filter
    foreach ($data['services_url'] as $key => $service) {
      if ($service === $show) {
        $gallery_key = $key;
      }
    }
  }


  //GET LIST OF MATCHING PROFILES FOR PREV/NEXT BUTTONS
  $results = array();
  foreach ($data['users'] as $key => $user) {

    if ($filterby === 'location') {
      if (isset($gallery_key) && $user['locations'][$gallery_key]) {
        array_push($results, $user['url'].'?filterby=location&show='.$show);
      }
    } elseif ($filterby === 'service'){
      if (isset($gallery_key) && $user['services'][$gallery_key]) {
        array_push($results, $user['url'].'?filterby=service&show='.$show);
      }
    } else {
      array_push($results, $user['url']);
    }
  }

  //CURRENT USER
  foreach ($results as $key => $result) {
    if ($result === _CURR_FULLURL) {
      $results_curr = $key;
    }
  }
  $results_curr = $results_curr ?? -1;
  $results_total = (count($results) -1);
 
  // echo'<pre>';print_r($results);echo'</pre>';
  // echo'currently at index: '.$results_curr.'</br>';
  // echo'last index number: '.$results_total;
  // die();


  // GET CURRENT USER DATA
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
<div class="container container-medium py-md-2">
  <div class="row mt-2 profile-nav no-padding">
    <div class="col-4">
      <?php
        if ($data['addons']['prevnext'] === 1) {
          if ($results_curr > 0) {
            $link = $results[($results_curr - 1)];
            echo '<a href="'._ROOT_FOLDER.'profile/'.$link.'"><i class="far fa-arrow-left mr-2"></i>Previous<span> Profile</span></a>';
          }
        }
      ?>
    </div><!-- col -->
    <div class="col-4 text-center">
      <a href="<?php echo _ROOT_FOLDER.$gallery ?>">
        <?php if (isset($gallery_key) && $results_curr >= 0) {echo $data[$gallery_index][$gallery_key].' - ';}?><span>Back to </span>Gallery<i class="fas fa-images ml-2"></i>
      </a>
    </div><!-- col -->
    <div class="col-4 text-right">
      <?php
        if ($data['addons']['prevnext'] === 1) {
          if ($results_curr >= 0 && $results_curr !== $results_total) {
            $link = $results[($results_curr + 1)];
            echo '<a href="'._ROOT_FOLDER.'profile/'.$link.'">Next<span> Profile</span><i class="far fa-arrow-right ml-2"></i></a>';
          }
        }
      ?>
    </div><!-- col -->
  </div><!-- row -->
</div>

<div class="container container-medium text-left profile">
  <div class="row mt-3">
    <div class="col text-center text-fancy title-fancy">
      <h1 class="mb-0 py-0 text-capitalize"><?php echo $user['name'];?>'s Profile</h1>
    </div><!-- col -->
  </div><!-- row -->

  <?php
    $gallery_location ='assets/user/'.$user['id'].'/';
    if (file_exists($gallery_location)) {

      // Create array of file locations
      $arr = array();
      if (file_exists($gallery_location.'primary.'._IMAGE_EXT)) {array_push($arr, 'primary.'._IMAGE_EXT);}
      if (file_exists($gallery_location.'secondary.'._IMAGE_EXT)) {array_push($arr, 'secondary.'._IMAGE_EXT);}
      $images = array_values(array_diff(scandir($gallery_location.'/gallery'), array('..', '.')));
      if ($images) {
        foreach ($images as $image) {
          array_push($arr, 'gallery/'.$image);
        }  
      }

      // echo'<pre>';print_r($arr);echo'</pre>';
      $total = count($arr);

      if ($total > 0) {
        echo '<div class="row gallery mt-4">';
        $i = 0;
        foreach ($arr as $image) {
          if ($i === 0) {
            echo '
            <div class="col-md-6">
              <a data-fancybox="gallery" href="../'.$gallery_location.$image.'">
                <div class="media-holder">
                  <img src="../'.$gallery_location.$image.'" alt="">
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-0">
              <div class="row gallery mb-0">
            ';
          } elseif ($i < 5){
            echo'
                <div class="col-6">
                  <a data-fancybox="gallery" href="../'.$gallery_location.$image.'">
                    <div class="media-holder">
                      <img src="../'.$gallery_location.$image.'" alt="">
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
              <a data-fancybox="gallery" href="../'.$gallery_location.$image.'">
                <div class="media-holder">
                  <img src="../'.$gallery_location.$image.'" alt="">
                </div>
              </a>
            </div>
            ';
          } else {
            echo'
            <div class="col-6 col-md-3">
              <a data-fancybox="gallery" href="../'.$gallery_location.$image.'">
                <div class="media-holder">
                  <img src="../'.$gallery_location.$image.'" alt="">
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

  <div class="px-md-4 pt-5 pb-4">
    <div class="row">
      <div class="col-12">
        <a href="tel:<?php echo str_replace(' ', '', $data['client']['phone']) ?>" title="Call to book now">
          <div class="btn btn-wide btn-primary btn-icon inview"><span>Call to Book<i class="fas fa-phone"></i></span></div>
        </a>
        <a href="sms:<?php echo str_replace(' ', '', $data['client']['sms']) ?>" title="Text to book now">
          <div class="btn btn-wide btn-primary btn-icon inview"><span>Message to Book<i class="fas fa-sms"></i></span></div>
        </a>
        <a href="https://api.whatsapp.com/send?phone=44<?php echo substr(str_replace(' ', '', $data['client']['whatsapp']), 1) ?>">
          <div class="btn btn-wide btn-primary btn-icon inview"><span>WhatsApp to Book<i class="fab fa-whatsapp"></i></span></div>
        </a>
      </div>
    </div><!-- row -->
  </div>


  <div class="px-md-4 pt-4">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="title-fancy-small">
          <h5>Stats</h5>
        </div>
        <div>
          <?php
            if ($user['stats']) {
              echo'
                <table class="table">
                  <tr>
                    <td>Locations</td>
                    <td>
              ';
              foreach ($data['locations'] as $key => $location) {
                if ($user['locations'][$key] === 1) {
                  echo '<div class="list-commas">'.$location.'</div>';
                }
              }
              echo'
                    </td>
                  </tr>
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
        <div class="gap-1"></div>
        <div class="title-fancy-small">
          <h5>About me</h5>
        </div>
          <?php if ($user['bio']) {
            echo '<p>'.$user['bio'].'</p>';
          } else {
            echo '<p>Information to follow</p>';
          } ?>
        </div>

      <div class="col-md-6 mb-4">
        <div class="title-fancy-small">
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
                  <td>'._CURRENCY.' '.$rate['rate1'].'</td>
                  <td>'._CURRENCY.' '.$rate['rate2'].'</td>
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

      <?php if ($data['addons']['services']): ?>

        <div class="gap-1"></div>
        <div class="title-fancy-small">
          <h5>Services</h5>
        </div>
        <div class="pt-3">
          <?php if ($user['services']) {
            $i=0;
            foreach ($data['services'] as $service) {
              if ($user['services'][$i] == 1):
                $service_url = preg_replace('/[^A-Za-z0-9. -]/', '', $service); // remove special charaters
                $service_url = preg_replace('/\s+/', ' ',$service_url); // fix double-spaces
                $service_url  = preg_replace('#[ -]+#', '-', strtolower(trim($service_url ))); // replace spaces with hypens
              ?>
                  <a href="<?php echo _ROOT_FOLDER ?>service/<?php echo $service_url ?>" title="Click to see all profiles offering <?php echo $service; ?>">
                    <div class="btn btn-primary is-outline btn-icon btn-small text-capitalize"><span><?php echo $service; ?><i class="fas fa-chevron-right"></i></span></div>
                  </a>
              <?php
              endif;
              $i++;
            }
          } else {
            echo '<p>Information to follow</p>';
          } ?>
        </div>

      <?php endif; ?>

    </div><!-- column -->
  </div><!-- row -->
  <div class="gap-4"></div>

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

