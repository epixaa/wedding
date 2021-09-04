<?php
  if (isset($_SESSION['username']))
  {
    echo
    "
      <li><a href='#' onclick='logout_account()'><b> Изход </b></a></li>
      <li><a href='#' data-toggle='modal' data-target='#reservationModal'><b> Приемане на резервации </b></a></li>
      <li><a href='#' data-toggle='modal' data-target='#reservedModal'><b> Резервирани </b></a></li>
    ";
  }
  else
  {
    echo
    "
      <li><a href='#' data-toggle='modal' data-target='#loginModal'><b> Вход </b></a></li>
     <!-- <li><a href='#' data-toggle='modal' data-target='#registerModal'><b> Регистрация </b></a></li> -->
    ";
  }

?>
