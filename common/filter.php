<h5 class="mb-4 text-center">Filter</h5>
<!-- Expanding List -->
<ul class="list list-filter">

  <li>
    <a href="#filter-age" data-toggle="collapse" class="collapsed">
      Age
      <i class="far fa-chevron-down"></i>
    </a>
    <ul class="collapse" id="filter-age">
      <li><a href="#"><span>18-23</a></li>
      <li><a href="#"><span>24-29</a></li>
      <li><a href="#"><span>30-35</a></li>
      <li><a href="#"><span>35+</a></li>
    </ul>
  </li>

  <?php foreach ($stats as $stat) {
    echo'
    <li>
      <a href="#filter-'.$stat['id'].'" data-toggle="collapse" class="collapsed">
        '.$stat['title'].'
        <i class="far fa-chevron-down"></i>
      </a>
      <ul class="collapse" id="filter-'.$stat['id'].'">
    ';
    foreach ($stat['options'] as $option) {
      echo'
        <li><a href="#"><span>'.$option.'</a></li>
      ';
    }
    echo'
      </ul>
    </li>
    ';
  } ?>

  <li>
    <a href="#filter-rates" data-toggle="collapse" class="collapsed">
      Rates
      <i class="far fa-chevron-down"></i>
    </a>
    <ul class="collapse" id="filter-rates">
      <li><a href="#"><span>Price (low)</a></li>
      <li><a href="#"><span>Price (high)</a></li>
    </ul>
  </li>

  <li>
    <a href="#filter-services" data-toggle="collapse" class="collapsed">
      Services
      <i class="far fa-chevron-down"></i>
    </a>
    <ul class="collapse list-2col" id="filter-services">
      <?php
        $i = 1;
        foreach ($services as $service) {
          echo '
          <li>
            <input class="styled-checkbox" id="services'.$i.'" type="checkbox" value="value1">
            <label for="services'.$i.'">'.$service.'</label>
          </li>
          ';
          $i++;
        }
      ?>
    </ul>
  </li>

  <li>
    <a href="#item-8" data-toggle="collapse" class="collapsed">
      Distance
      <i class="far fa-chevron-down"></i>
    </a>
    <ul class="collapse" id="item-8">
    <div class="range-container mb-4">
      <output id="sliderDistanceOutput">5</output> Km
      <input type="range" id="sliderDistance" min="1" max="50" value="5" class="range-slider" oninput="sliderDistanceOutput.value = sliderDistance.value">
    </div>
    </ul>
  </li>

</ul>

<div class="py-3 sticky sticky-bottom">
  <button id="filter-clear" class="btn btn-outline btn-half animation-order-1 reveal reveal-down">Clear All<i class="fal fa-redo"></i></button>
  <a href="#" data-dismiss="modal" class="btn btn-half animation-order-2 reveal reveal-down">Show Results<i class="fal fa-chevron-right"></i></a>
</div>


</div><!-- List Group -->
