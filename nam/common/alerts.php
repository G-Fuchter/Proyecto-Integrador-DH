<?php

function errors_warning_alert ($errors_array){
  foreach ($errors_array as $error) {
    echo '<div class="alert alert-warning"> <strong>Warning!</strong> ' . $error . '</div>';
  }
}
?>