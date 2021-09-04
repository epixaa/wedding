<?php
  session_start();
  include 'db.php';
  include 'query.php';
  $database = new db();

  //Проверка за потребител
  if (isset($_REQUEST["user"]))
  {
    $username = $_REQUEST['user'];
    $count = $database->get_row(sprintf(user_check, $username));
    if ($count['count'] != 0)
    {
      echo "Това потребителско име, вече съществува.";
    }
  }
  //Регистрация
  else if(isset($_REQUEST["u"]) && isset($_REQUEST["p"]))
  {
    $database->others(sprintf(user_insert,$_REQUEST["u"], $_REQUEST["p"]));
  }
  else if(isset($_REQUEST["lu"]) && isset($_REQUEST["lp"]))
  {
    $username = $_REQUEST['lu'];
    $password = $_REQUEST['lp'];
    $count = $database->get_row(sprintf(user_pass_check, $username, $password));
    if ($count['count'] == 0)
    {
      echo "Грешно потребителско име/Парола";
    }
    else
    {
      $_SESSION['username'] = $username;
      echo "";
    }
  }
  else if(isset($_REQUEST["logout"]))
  {
    $_SESSION['username'] = null;
  }
  else if(isset($_REQUEST["fill"]))
  { 
    $reserve = $database->get_multi_row(reservation); 
    foreach($reserve as $row)
    {
      echo "<tr>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['number']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['pname']."</td>";
      echo "<td><input class='btn btn-success' type='button' data-value=".$row['id']." onclick='acceptRes($(this).data().value)' name='accept' value='Потвърди'><input class='btn btn-danger' type='button' data-value=".$row['id']." onclick='deleteRes($(this).data().value)' name='delete' value='Изтрий'></td>";
      echo "</tr>";
    } 
  }
  else if(isset($_REQUEST["fill1"]))
  {
    $reserve = $database->get_multi_row(reservation1);
    $result = "";
    foreach($reserve as $row)
    {
      echo "<tr>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['number']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['pname']."</td>";
      echo "<td><input class='btn btn-danger' type='button' data-value=".$row['id']." onclick='cancelRes($(this).data().value)' name='delete' value='Откажи'></td>";
      echo "</tr>";
    }
    echo $result;
  }
  else if(isset($_REQUEST["updateRes"]))
  {
    $database->others(sprintf(update_reserve, $_REQUEST["updateRes"]));
  }
  else if(isset($_REQUEST["deleteRes"]))
  {
    $database->others(sprintf(delete_reserve, $_REQUEST["deleteRes"]));
  }
  else if(isset($_REQUEST["cancelRes"]))
  {
    $database->others(sprintf(un_reserve, $_REQUEST["cancelRes"]));
  }
?>
