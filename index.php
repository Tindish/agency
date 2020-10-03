<!DOCTYPE html>
<html lang="en">

<?php
  
  //Check url components
  $current_url = explode('/', $_SERVER['REQUEST_URI']);
  // echo'<pre>';print_r($current_url);echo'</pre>';
  // Working locally or live?
  $whitelist = ['127.0.0.1', '::1'];
  if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    //TESTING ENVIRONMENT
    define('_ROOT_FOLDER', '/agency/');
    if (array_key_exists(2, $current_url) && substr($current_url[2], 0, 1) !== '?') {define('_CURR_FOLDER', $current_url[2]);} else {define('_CURR_FOLDER', '');}
    if (array_key_exists(3, $current_url) ) {define('_CURR_TARGET', strstr($current_url[3],'?',true) ?: $current_url[3]);} else {define('_CURR_TARGET', '');}
    if (array_key_exists(3, $current_url) ) {define('_CURR_FULLURL', $current_url[3]);} else {define('_CURR_FULLURL', '');}
  } else {
    //LIVE ENVIRONMENT
    define('_ROOT_FOLDER', '/'); 
    if (array_key_exists(1, $current_url) && substr($current_url[1], 0, 1) !== '?') {define('_CURR_FOLDER', $current_url[1]);} else {define('_CURR_FOLDER', '');}
    if (array_key_exists(2, $current_url) ) {define('_CURR_TARGET', strstr($current_url[2], '?', true) ?: $current_url[2]);} else {define('_CURR_TARGET', '');}
    if (array_key_exists(2, $current_url) ) {define('_CURR_FULLURL', $current_url[2]);} else {define('_CURR_FULLURL', '');}
  }

// echo '_CURR_FOLDER is '._CURR_FOLDER.'</br>';
// echo '_CURR_TARGET is '._CURR_TARGET.'</br>';
// echo '_CURR_FULLURL is '._CURR_FULLURL.'</br>';
// die();

  //Pull JSON data into an array
  $data = json_decode(file_get_contents("data.json"), true);

  //Create url friendly versions of some data
  $data['locations_url'] = array();
  $data['services_url'] = array();
  foreach ($data['locations'] as $item) {
    $item = preg_replace('/[^A-Za-z0-9. -]/', '', $item); // remove special charaters
    $item = preg_replace('/\s+/', ' ',$item); // fix double-spaces
    $item = preg_replace('#[ -]+#', '-', strtolower(trim($item))); // replace spaces with hypens
    array_push($data['locations_url'], $item);
  }
  foreach ($data['services'] as $item) {
    $item = preg_replace('/[^A-Za-z0-9. -]/', '', $item); // remove special charaters
    $item = preg_replace('/\s+/', ' ',$item); // fix double-spaces
    $item = preg_replace('#[ -]+#', '-', strtolower(trim($item))); // replace spaces with hypens
    array_push($data['services_url'], $item);
  }

  //echo'<pre>';print_r($data);echo'</pre>';

  //SET GLOBAL VARIABLES
  define('_IMAGE_EXT', $data['general']['image_ext']);
  define('_CURRENCY', $data['client']['currency']);
?>


<head>
  <?php include 'common/meta.php';?>

  <!-- Page specific meta in here -->
  <?php if (_CURR_FOLDER === ""): ?>

  <?php endif ?>
  <?php if (_CURR_FOLDER === "location"): ?>

  <?php endif ?>



  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>Page Title</title>

</head>
<body>
  <?php include 'common/header.php';?>

  
    <!-- Pull in page specific content -->
    <?php if (_CURR_FOLDER === "") {
      include 'pages/homepage.php';
    } elseif (_CURR_FOLDER === "location" && $data['addons']['locations']) {
      include 'pages/gallery.php';
    } elseif (_CURR_FOLDER === "service" && $data['addons']['services']) {
      include 'pages/gallery.php';
    } elseif (_CURR_FOLDER === "profile") {
      include 'pages/profile.php';
    } elseif (_CURR_FOLDER === "news" && $data['addons']['blog']) {
      include 'pages/blog.php';
    } elseif (_CURR_FOLDER === "recruitment" && $data['addons']['recruitment']) {
      include 'pages/generic.php';
    } elseif (_CURR_FOLDER === "service" && $data['addons']['services']) {
      include 'pages/generic.php';
    } elseif (_CURR_FOLDER === "bookings") {
      include 'pages/generic.php';
    } else {
      echo '
        <div class="container">
          <h5 class="text-center pt-5">I don&apos;t know where you want to go :(</h5>        
        </div>
      ';
      include 'pages/page404.php';
    } ?>

  <?php include 'common/footer.php';?>
</body>
</html>