<?php include 'includes/header.php';?>

<div class="container text-center">
  <section class="light px-3 mt-2 mt-md-5 container-tiny">
    <div class="row">
      <div class="col d-flex flex-column mt-5">
        <div class="mb-2">
          <h4 class=fancy>Members</h4>
        </div>
        <div class="mb-4">
          <h5>Activation Email</h5>
          <p>Please enter your email address and we'll re-send your activation email</p>
        </div>
        <div class="mb-4">
          <form id="formActivate" class="form" action="form-handler.php">
            <div class="form-group">
              <label for="activation-email">Email address</label>
              <input id="activation-email" name="activation-email" type="email" required class="form-control">
            </div>
            <button type="submit" class="btn btn-wide mt-3 animation-order-1 reveal reveal-down">Send</button>
            <a href="./login.php">
              <p class="small mt-2">Back to login</p>
            </a>
          </form>
        </div>
        </div><!-- col -->
      </div><!-- row -->
    </section>
  </div><!-- container -->

<?php include 'includes/footer.php';?>
<script>
  $("#formActivate").validate();
</script>