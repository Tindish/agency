<?php
// Filter profiles by status
  $performers = array_filter($performer, function ($var) {
    global $status;
    return ($var['status'] == $status);
  });
  $counter = 0;
  foreach ($performers as $p) {
    if (!$carousel > 0) {
      echo '<div class="d-flex flex-column ';
      if ($status=='vip') {
        echo 'col-md-6 col-lg-4 col-xl-3';
      } elseif ($status=='featured') {
        echo 'col-6 col-md-4 col-lg-3 col-xl-20';
      } else {
        echo 'col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 smaller';
      }
    } else {
      echo '<div class="';
    }
    if ($p["highlight"]==1) {
      echo ' gallery-highlight';
    }
    echo'
      ">
        <a href="./profile.php">
          <div class="status-'.$status.'">
            <div class="image-holder">
              <img src="./img/user/'.$p['id'].'/profile.png" alt="">
              <div class="gallery-cover"></div>
              <div class="gallery-badge"></div>
              <div class="gallery-tag animation-order-3">'.$status.'</div>
              <div class="gallery-info-box">
                <div class="d-flex">
                  <h6 class="text-capitalize">'.$p['name'].' <span class="smaller">Age '.$p['age'].'</span></h6>
                  <div class="gallery-rating">
                  ';
                  // STAR RATINGS
                  for ($i=1; $i < 6; $i++) { 
                    if ($i <= $p['stars']) {
                      echo' <i class="fas fa-star"></i>';
                    } else {
                      echo' <i class="far fa-star"></i>';
                    }
                  }
                  echo '
                  </div>
                </div>
                <p class="text-uppercase mb-2">'.$p['location'].' / '.$p['agency'].' / £'.$p['price'].' (hr)</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    ';
    $counter++;
    if($counter == $quantity) break;
  }
?>