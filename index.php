<!DOCTYPE html>
<html lang="en">

<?php
  
  //Check url components
  $locator = explode('/', $_SERVER['REQUEST_URI']);

  // Working locally or live?
  $whitelist = ['127.0.0.1', '::1'];
  if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    //TESTING ENVIRONMENT
    define('_ROOT_FOLDER', '/agency/');
    if ((array_key_exists(2, $locator)) ) {define('_CURR_FOLDER', $locator[2]);} else {define('_CURR_FOLDER', '');}
    if ((array_key_exists(3, $locator)) ) {define('_CURR_TARGET', $locator[3]);} else {define('_CURR_TARGET', '');}
  } else {
    //LIVE ENVIRONMENT
    define('_ROOT_FOLDER', '/'); 
    if ((array_key_exists(1, $locator)) ) {define('_CURR_FOLDER', $locator[1]);} else {define('_CURR_FOLDER', '');}
    if ((array_key_exists(2, $locator)) ) {define('_CURR_TARGET', $locator[2]);} else {define('_CURR_TARGET', '');}
  }

// echo '_CURR_FOLDER is '._CURR_FOLDER.'</br>';
// echo '_CURR_TARGET is '._CURR_TARGET.'</br>';

  //Pull JSON data into an array
  $data = json_decode(file_get_contents("data.json"), true);
  //echo'<pre>';print_r($data);echo'</pre>';

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

    <!-- Page specific meta in here -->
    <?php if (_CURR_FOLDER === "") {
      include 'pages/homepage.php';
    } elseif (_CURR_FOLDER === "location") {
      include 'pages/gallery.php';
    } elseif (_CURR_FOLDER === "profile") {
      include 'pages/profile.php';
    } elseif (_CURR_FOLDER === "news") {
      include 'pages/blog.php';
    } elseif (_CURR_FOLDER === "bookings" || _CURR_FOLDER === "recruitment") {
      include 'pages/generic.php';
    } else {
      include 'pages/page404.php';
    } ?>

  <?php include 'common/footer.php';?>
</body>
</html>