<?php
      include 'db.php';
      include 'query.php';
      $database = new db();
      $date = $_GET["date"];
      $rdate= DateTime::createFromFormat('m/d/Y', $date)->format('Y/m/d');
      $qDate = new DateTime($date);
      $errors         = array();
      $data           = array();
       if($rdate>date("Y/m/d")){
              $reserved_num = $database->get_row(sprintf(count_reserved,$qDate->format('Y/m/d')));
              if ($reserved_num["count"] == 0){
                     $data['success'] = true;
              }else
              {
                     $data['success'] = false;
                     $data['error'] = 'Тази дата вече резервирана.';
              }
       }else
       {
              $data['success'] = false;
              $data['error'] = 'Тази дата вече отмина.';
       }
       echo json_encode($data);
?>
