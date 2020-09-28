
</main>
<footer>
  <div class="container footer py-3">
    <div class="row">
      <div class="col-sm-6 col-lg-3 col-xl-2 pr-md-5">
        <a href="<?php echo _ROOT_FOLDER ?>"><img src="<?php echo _ROOT_FOLDER ?>assets/logo.png" alt="logo"></a>
        <div class="icons-only mt-3">
          <?php include 'common/socials.php';?>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 col-xl-3 pt-sm-4 pt-lg-0">
        <ul>
          <li><a href="<?php echo _ROOT_FOLDER ?>terms-and-conditions/">Terms and Conditions</a></li>
          <li><a href="<?php echo _ROOT_FOLDER ?>privacy-policy/">Privacy Policy</a></li>
          <li><a href="<?php echo _ROOT_FOLDER ?>cookie policy/">Cookie Policy</a></li>
        </ul>
      </div>
      <div class="col-sm-12 col-lg-6 col-xl-5">
        <p class="small primary mb-0"><?php echo $data['client']['name']?> offers companionship/escort services only. Our escorts do not provide or offer any illegal services. Fees are paid for the escort’s time and companionship only. Anything implied or inferred within these pages is not to be taken as inducement for payment for anything other than time and companionship. Anything that occurs between the client and the escort is based on the strict understanding that it will be a matter of choice between two consenting adults.</p>
      </div>


    </div> <!-- row -->
  </div><!-- container -->
  <section class="invert">
    <div class="container">
      <div class="row footer-absolute">
        <div class="col py-1">
          <div>&copy <?php echo $data['client']['name'].' '.date('Y')?></div>
          <div>Designed and Mananged by <a href="<?php echo $data['creator']['url'] ?>" target="_blank"><?php echo $data['creator']['name'] ?></a></div>
        </div>
      </div> <!-- row -->
    </div>
  </section>
</footer>




<!-- Javascript Includes and Functions -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo _ROOT_FOLDER ?>js/fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo _ROOT_FOLDER ?>js/init.min.js"></script>
<link rel="stylesheet" href="<?php echo _ROOT_FOLDER ?>css/fancybox.min.css">


</body>

</html>