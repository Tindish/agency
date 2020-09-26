<?php
  if (!empty($data['client']['socials'])) {
    echo '<ul class="list-socials">';
      foreach ($data['client']['socials'] as $item) {
        echo'
        <li><a href="'.$item['url'].'" target="_blank"><i class="'.$item['icon'].'"></i><span>'.$item['name'].'<span></a></li>
        ';
      }
    echo'</ul>';
  }
?>

