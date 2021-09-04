<?php
      session_start();
       include 'db.php';
       include 'query.php';

       $database     = new db();
       $errors         = array();
       $data           = array();
       if (empty($_POST['name']))
              $errors['name'] = 'Моля, въведете име.';

       if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
              $errors['name'] = 'Моля, използвайте само букви.';

       if (empty($_POST['email']))
              $errors['email'] = 'Моля, въведете email.';

       if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
              $errors['email'] = 'Моля, въведете валиден email.';

       if (empty($_POST['number']))
              $errors['number'] = 'Моля, въведете телефонен номер.';

       if (empty($_POST['photographer']))
              $errors['photographer'] = 'Моля, изберете фотограф.';

       if (empty($_POST['date']))
              $errors['date'] = 'Моля, изберете дата.';

     
       
       if ( ! empty($errors)) {
              $data['success'] = false;
              $data['errors']  = $errors;
       } else {
              $rdate= DateTime::createFromFormat('m/d/Y', $_POST['date'])->format('Y/m/d');
              $database->others(sprintf(reserve_insert, $rdate, $_POST['name'], $_POST['email'], $_POST['number'], $_POST['photographer']));
              
              $data['success'] = true;
              $data['message'] = 'Успешна направена резервация!';
       }
       echo json_encode($data);
?>
