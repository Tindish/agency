


  <div class="container px-0 pt-5">
    <h1 class="text-center title-fancy px-5 py-3">Welcome to <?php echo $data['client']['name'] ;?></h1>
  </div>
  <div class="container container-small text-center" id="gallery">
    <p class="pt-4">If your looking for the very best escorts in your area <span class="primary bold"><?php echo $data['client']['name']; ?></span> have an amazing choice of sexy, classy companions who can make your wildest dreams come true! Just have a browse below and click the profile you like the look of to find out more.</p>
  </div>

<div class="container container py-5">
  <div class="row gallery">
    <?php
      $filter_url = "";
      foreach ($data['users'] as $user) {include 'common/user.php';
    }?>
  </div>
</div>