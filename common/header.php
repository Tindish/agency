<header>

  <div class="container-fluid" id="navbar-fixed">

    <?php if ($data['addons']['topbar']): ?>
    <!-- Topbar -->
    <div class="topbar">
      <div class="container">
        <ul class="list list-inline">
          <li>
            <a href="mailto:<?php echo $data['client']['email']; ?>"><?php echo $data['client']['email']; ?></a>
          </li>
          <li>
            <a href="tel:<?php echo str_replace(' ', '', $data['client']['phone']); ?>"><?php echo $data['client']['phone']; ?></a>
          </li>
          <li>
            <div class="icons-only small">
              <?php include 'common/socials.php';?>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <?php endif; ?>

    <!-- Main Nav -->
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="<?php echo _ROOT_FOLDER ?>">
        <img src="<?php echo _ROOT_FOLDER ?>assets/logo.png" alt="Site Logo">
      </a>
      <a href="#" id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#navbarToggler">
        <div class="icon-text d-lg-none ml-auto"><div>
            <i class="open far fa-times"></i>
            <i class="stretch far fa-bars"></i>
          </div>
          <div class=icon-text-text>Menu</div>
        </div>
      </a>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a  class="nav-link primary" href="<?php echo _ROOT_FOLDER ?>#gallery"><?php echo $data['client']['main'] ?></a></li>

          <!-- DESKTOP ONLY FOR DROPDOWN MENU -->
          <?php if ($data['stats']['locations']['options']): ?>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown">Locations</a>
              <div class="dropdown-menu">
                <ul>
                  <?php foreach ($data['stats']['locations']['options'] as $location):
                    // Sanitise for url
                    $location = preg_replace('/[^A-Za-z0-9. -]/', '', $location); // remove special charaters
                    $location = preg_replace('/\s+/', ' ',$location); // fix double-spaces
                    $location_url  = preg_replace('#[ -]+#', '-', strtolower(trim($location ))); // replace spaces with hypens
                  ?>
                    <li><a href="<?php echo _ROOT_FOLDER ?>location/<?php echo $location_url ?>/"><?php echo $location ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
            <!-- MOBILE -->
            <li class="nav-item d-lg-none">
              <a class="nav-link collapse-toggle" data-toggle="collapse" href="#collapseLocations1" role="button">Locations</a>
              <div class="collapse" id="collapseLocations1">
                <ul>
                  <?php foreach ($data['stats']['locations']['options'] as $location): ?>
                    <li><a href="<?php echo _ROOT_FOLDER ?>location/<?php echo $location_url ?>/"><?php echo $location ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
          <?php endif; ?>

          <li class="nav-item"><a class="nav-link primary" href="<?php echo _ROOT_FOLDER ?>bookings/">Bookings</a></li>
          <?php if ($data['addons']['recruitment']) {echo '<li class="nav-item"><a class="nav-link primary" href="'._ROOT_FOLDER.'recruitment/">Recruitment</a></li>';}?>
          <?php if ($data['addons']['blog']) {echo '<li class="nav-item"><a class="nav-link primary" href="'._ROOT_FOLDER.'news/">News</a></li>';}?>

        </ul>
      </div>
    </nav>
  </div><!-- container -->
  <div class="clearfix"></div>
</header>




<main>
