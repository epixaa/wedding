<?php
  

  define("count_reserved", "SELECT COUNT(*) as count FROM reserve WHERE date = '%s' AND isConfirmed=0");
  define("user_check", "SELECT COUNT(*) as count FROM admin WHERE user='%s'");
  define("user_pass_check", "SELECT COUNT(*) as count FROM admin WHERE user='%s' AND pass='%s'");
  define("user_insert", "INSERT INTO admin(user, pass) VALUES('%s', '%s')");
  define("photographer_table","SELECT id,CONCAT(name,' ',last) as name FROM photographer ");
  define("reserve_insert","INSERT INTO reserve(date,name,email,number,isConfirmed,photographer_id) VALUES('%s','%s','%s','%s',1,%s)");
  define("reservation", "SELECT reserve.id, reserve.name, reserve.date, reserve.email, reserve.number, CONCAT(photographer.name,' ',photographer.last) as pname
                        FROM reserve INNER JOIN photographer ON photographer.id = reserve.photographer_id WHERE isConfirmed = 1");
  define("un_reserve", "UPDATE reserve SET isConfirmed = 1 WHERE id = %s");
  define("reservation1", "SELECT reserve.id, reserve.name, reserve.date,reserve.email,reserve.number, CONCAT(photographer.name,' ',photographer.last) as pname
                          FROM reserve INNER JOIN photographer ON photographer.id = reserve.photographer_id WHERE isConfirmed = 0");
  define("update_reserve", "UPDATE reserve SET isConfirmed = 0 WHERE id = %s");
  define("delete_reserve", "DELETE FROM reserve WHERE id = %s");

?>
