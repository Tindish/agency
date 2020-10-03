


  <?php

    //SET IMAGES
    
    // Default primary image if no images found
    $primary = _ROOT_FOLDER.'assets/no-image.'._IMAGE_EXT;

    // Set the gallery location based on current user id
    $gallery_location = 'assets/user/'.$user['id'].'/';

    // Does this user have an image folder?
    if (file_exists($gallery_location)) {
      
      // Create array and populate with gallery files if any
      $images = array_values(array_diff(scandir($gallery_location.'gallery'), array('..', '.')));
      //echo '<pre>';print_r($images);echo'</pre>';

      // Have they set a Primary image?
      if (file_exists($gallery_location.'primary.'._IMAGE_EXT)) {
        $primary = _ROOT_FOLDER.$gallery_location.'primary.'._IMAGE_EXT;
      } else {
        // If not, is there a file stored at key 0 of the images array?
        $primary = array_key_exists(0, $images) ? _ROOT_FOLDER.$gallery_location.'gallery/'.$images[0] : _ROOT_FOLDER.'assets/no-image.'._IMAGE_EXT;
      }

      // Have they set a Secondary image?
      if (file_exists($gallery_location.'secondary.'._IMAGE_EXT)) {
        $secondary = _ROOT_FOLDER.$gallery_location.'secondary.'._IMAGE_EXT;
      } else {
        // If not, is there a file stored at key 1 of the images array?
        $secondary = array_key_exists(1, $images) ? $gallery_location.'gallery/'.$images[1]: null;
      }

    } else {
      echo '<script>console.log("No image directory found at '.$gallery_location.'")</script></br>';
    }

echo '</br>';

  $link =  _ROOT_FOLDER.'profile/'.$user['url'];
  echo'
    <div class="col-6 col-md-4 col-lg-3 col-xl-20">
      <a href="'.$link.$filter_url.'">
        <div class="media-holder">
          <img src="'.$primary.'" alt="">
  ';
    if ($secondary) {echo'<img class="on-hover" src="'.$secondary.'" alt="">';}
  echo '
          
          <div class="gallery-cover"></div>
          <div class="gallery-badge"></div>
          <div class="gallery-tag animation-order-3">TAG</div>
          <div class="gallery-info-box">
            <div class="d-flex">
              <h6 class="text-capitalize">'.$user['name'].' <span class="smaller">Age '.$user['age'].'</span></h6>
            </div>
            <p class="text-uppercase mb-2">TEXT</p>
          </div>
        </div>

      </a>
    </div>

  ';


?>



