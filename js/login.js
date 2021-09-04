function login_account()
{
  var msg = "";
  var user = document.getElementById("luser").value;
  var pass = document.getElementById("lpass").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        if (this.responseText != "")
        {
          document.getElementById("login_error").innerHTML = this.responseText;
        }
        else
        {
          location.reload();
        }
      }
  };
  xmlhttp.open("GET", "global.php?lu="+user+"&lp="+pass, true);
  xmlhttp.send();
}

function logout_account()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?logout=ok", true);
  xmlhttp.send();
}


