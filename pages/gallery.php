<?php
// echo '_CURR_FOLDER is '._CURR_FOLDER.'</br>';
// echo '_CURR_FOLDER is '._CURR_TARGET.'</br>';


  //GET REFERRED FROM INFO FOR 'Back to Gallery' LINK AND NAV LINKS
  $filter_url = "";
  $filter_url = $filter_url. (_CURR_FOLDER ? '?filterby='._CURR_FOLDER : "");
  $filter_url = $filter_url. (_CURR_TARGET ? '&show='._CURR_TARGET : "");

  //GET DETAILS OF WHAT USER IS SEARCHING FOR
  $index = null;
  foreach ($data[_CURR_FOLDER.'s_url'] as $key => $value) {
    if ($value === _CURR_TARGET) {$index = $key;}
  }
  $show = $index ? $data[_CURR_FOLDER.'s'][$index] : null;
  if ($show) {
?>
  
    
  <div class="container px-0 pt-5">
    <h1 class="text-center title-fancy px-5 py-3">Escorts<?php
        if (_CURR_FOLDER === 'location'){echo' in ';}
        if (_CURR_FOLDER === 'service'){echo' that offer ';}
        echo $show;
    ?></h1>
  </div>
  <div class="container container-small text-center">
    <p class="pt-4">Looking for escorts <?php
        if (_CURR_FOLDER === 'location'){echo' in <span class="primary bold">';}
        if (_CURR_FOLDER === 'service'){echo' that offer <span class="primary bold">';}
        echo $show;
    ?></span>? Here at <span class="primary bold"><?php echo $data['client']['name']; ?></span> we have an amazing choice of sexy, classy companions who can make your wildest dreams come true! Just have a browse below and click the profile you like the look of to find out more.</p>
  </div>

  <!-- GALLERY -->
  <div class="container py-5">    
    <div id="gallery">
      <div class="row gallery">
        <?php

          $i = 0;
          foreach ($data['users'] as $user) {
            if ($user[_CURR_FOLDER.'s'][$index]){
              include 'common/user.php';
              $i++;
            }
          }
          if ($i === 0) {
            echo'
              <div class="col-12">
                <h5 class="text-center">Sorry but there were no matches</h5>;
              </div>
            ';
          }
        ?>
      </div>
    </div>
  </div>

  <!-- BOTTOM TEXT -->

  <div class="container container-small text-center">
    <p class="pt-4">Whatever your looking for <?php
        if (_CURR_FOLDER === 'location'){echo' in <span class="primary bold">';}
        if (_CURR_FOLDER === 'service'){echo' when it comes to <span class="primary bold">';}
        echo $show;
    ?></span>, <span class="primary bold"><?php echo $data['client']['name']; ?></span> have got you covered!</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id aliquet est, in sagittis nisl. Nam a tempus mi. Aenean laoreet, lectus ut iaculis eleifend, tortor ex cursus quam, a rhoncus ipsum urna at metus. Aliquam ultrices ultricies turpis, sed mollis orci faucibus eu. Integer et lorem a dui lobortis rutrum. Mauris ut placerat est, ut iaculis mauris. Maecenas et vehicula nisi.</p>
    <p>Sed scelerisque nulla eu sapien mollis, non tempus odio hendrerit. Sed ut lacus leo. Nulla accumsan augue a tristique semper. Vivamus a risus non ex elementum dignissim. Vivamus ac ante elit. Duis ut tortor sit amet lectus ultricies bibendum. Nam luctus mattis turpis, sit amet tempor erat ullamcorper sed. Ut ac ligula sollicitudin ante volutpat facilisis. In aliquet sapien non volutpat dapibus. Aliquam non nulla fringilla, auctor libero a, auctor purus. Quisque faucibus tortor quis orci egestas iaculis. Proin leo neque, tempor non magna at, ultrices mollis libero. Suspendisse sollicitudin ornare augue sit amet molestie. Vestibulum vitae pellentesque ante. Duis ultricies id urna quis laoreet.</p>
    <p>Nunc euismod lacus quis maximus commodo. Donec interdum pulvinar nunc pulvinar vestibulum. Nam tellus ante, suscipit sit amet est et, iaculis bibendum turpis. Praesent est lorem, vulputate sit amet enim sit amet, dictum dignissim lectus. Proin et dapibus libero.</p>.
  </div>

  <div class="gap-3"></div>

<?php
  } else {
    echo '
      <div class="container">
        <h5 class="text-center pt-5">Not sure how you ended up here</h5>        
      </div>
    ';
    include 'pages/page404.php';
  }
?>
