<?php
        include 'db.php';
        include 'query.php';
        // за извличане на данните за фотографистите от базата
        function comboFill($query){
                $database = new db();
               $table = $database->get_multi_row($query);
               foreach ($table as  $row){
                      echo ' <option value="'.$row["id"].'">'.$row["name"].'</option>';
               }
        }
        function insertReservation(){
               $rdate= DateTime::createFromFormat('m/d/Y', $_POST['date'])->format('Y/m/d');
              $database->others(sprintf(reserve_insert,$rdate->format(Y/m/d),$_POST['name'],$_POST['email'],$_POST['number']));
              
        }

 ?>
