<?php
  include 'db.php';
  include 'query.php';
  $database = new db();

  $username = $_REQUEST['user'];
  $count = $database->is_empty(sprintf(user_check, $username))
  if ($count['count'] != 0)
  {
    echo sprintf(user_check, $username);
  }
?>
