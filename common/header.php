<header>

  <div class="container-fluid px-0" id="navbar-fixed">

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
          <?php if($data['addons']['locations']):?>
            <?php if ($data['locations']): ?>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown">Locations</a>
                <div class="dropdown-menu">
                  <ul>
                    <?php foreach ($data['locations'] as $location):
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
                  <?php foreach ($data['locations'] as $location):
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
            <?php endif; ?>
          <?php endif; ?>

          <!-- DESKTOP ONLY FOR DROPDOWN MENU -->
          <?php if($data['addons']['services']):?>
            <?php if ($data['services']): ?>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown">Services</a>
                <div class="dropdown-menu dropdown-menu-narrow">
                  <div>
                    <?php foreach ($data['services'] as $service):
                      // Sanitise for url
                      $service = preg_replace('/[^A-Za-z0-9. -]/', '', $service); // remove special charaters
                      $service = preg_replace('/\s+/', ' ',$service); // fix double-spaces
                      $service_url = preg_replace('#[ -]+#', '-', strtolower(trim($service ))); // replace spaces with hypens
                    ?>
                    <a href="<?php echo _ROOT_FOLDER ?>service/<?php echo $service_url ?>/" class="d-inline">
                      <button class="btn btn-primary btn-icon btn-small text-capitalize"><span><?php echo $service; ?><i class="fas fa-chevron-right"></i></span></button>
                    </a>
                    <?php endforeach; ?>
                    </div>
                </div>
              </li>
              <!-- MOBILE -->
              <li class="nav-item d-lg-none">
                <a class="nav-link collapse-toggle" data-toggle="collapse" href="#collapseServices1" role="button">Services</a>
                <div class="collapse" id="collapseServices1">
                  <?php foreach ($data['services'] as $service):
                    // Sanitise for url
                    $service = preg_replace('/[^A-Za-z0-9. -]/', '', $service); // remove special charaters
                    $service = preg_replace('/\s+/', ' ',$service); // fix double-spaces
                    $service_url = preg_replace('#[ -]+#', '-', strtolower(trim($service ))); // replace spaces with hypens
                  ?>
                    <a href="<?php echo _ROOT_FOLDER ?>service/<?php echo $service_url ?>/">
                      <button class="btn btn-primary btn-icon btn-small text-capitalize"><span><?php echo $service; ?><i class="fas fa-chevron-right"></i></span></button>
                    </a>
                  <?php endforeach; ?>
                </div>
              </li>
            <?php endif; ?>
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


<!-- BOTTOM CONTACT BUTTONS -->

<?php if ($data['addons']['footer-buttons']): ?>
  <!-- Contact Buttons -->
  <div class="contact-buttons">
    <div class="contact-buttons-tel">
      <a href="tel:<?php echo str_replace(' ', '', $data['client']['phone']) ?>">
        <i class="fa fa-phone attention" aria-hidden="true"></i>
        <div>Call Us</div>
      </a>
    </div>
    <div class="contact-buttons-sms">
      <a href="sms:<?php echo str_replace(' ', '', $data['client']['sms']) ?>">
        <i class="fa fa-comments attention"></i>
        <div>Message Us</div>
      </a>
    </div>
    <div class="contact-buttons-whatsapp">
      <a href="https://api.whatsapp.com/send?phone=44<?php echo substr(str_replace(' ', '', $data['client']['whatsapp']), 1) ?>">
        <i class="fab fa-whatsapp attention"></i>
        <div>WhatsApp</div>
      </a>
    </div>

  </div>
<?php endif; ?>





<main>
