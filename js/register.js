var boolUser = false;
var boolPass = false;
var p = false;
var p1 = false;

function user_check(username)
{
  var msg = "";
  var ajax_result = "";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
          if (this.responseText != "")
          {
            msg = this.responseText;
            boolUser = false;
          }
          else if (username.length < 6)
          {
            msg = "Потребителското име трябва да съдържа поне 6 букви.";
            boolUser = false;
          }
          else if (msg == "")
          {
            boolUser = true;
          }
          document.getElementById("user").innerHTML = msg;
          btnEnable();
      }
  };
  xmlhttp.open("GET", "global.php?user=" + username, true);
  xmlhttp.send();
}

function pass_check()
{
  var pass = document.getElementById("password").value;
  var pass1 = document.getElementById("password1").value;
  if (pass.length < 6)
  {
    document.getElementById("pass").innerHTML = "Паролата трябва да съдържа поне 6 символа.";
    p = false;
  }
  else
  {
    document.getElementById("pass").innerHTML = "";
    p = true;
  }
  if (pass != pass1)
  {
    document.getElementById("pass1").innerHTML = "Паролите не съвпадат.";
    p1 = false;
  }
  else
  {
    document.getElementById("pass1").innerHTML = "";
    p1 = true;
  }
  btnEnable();
}

function btnEnable()
{
  if (p && p1 && boolUser)
  {
    document.getElementById("regist").disabled = false;
  }
  else
  {
    document.getElementById("regist").disabled = true;
  }
}

function submitReg()
{
  var p = document.getElementById("password").value;
  var u = document.getElementById("username").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        document.getElementById("successReg").innerHTML = "Успешна регистрация!";
      }
    }
  xmlhttp.open("GET", "global.php?u="+u+"&p="+p, true);
  xmlhttp.send();
}

$('#registerModal').on('hidden.bs.modal', function () {
  document.getElementById("username").value = null;
  document.getElementById("password").value = null;
  document.getElementById("password1").value = null;
  document.getElementById("user").innerHTML = "";
  document.getElementById("pass").innerHTML = "";
  document.getElementById("pass1").innerHTML = "";
  document.getElementById("successReg").innerHTML = "";
  document.getElementById("regist").disabled = false;
})

$("#reservationModal").on('show.bs.modal', function (){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        document.getElementById("bod").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "global.php?fill=ok", true);
  xmlhttp.send();
});

$("#reservedModal").on('show.bs.modal', function (){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        document.getElementById("bod1").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "global.php?fill1=ok", true);
  xmlhttp.send();
});

function acceptRes(data)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?updateRes="+data, true);
  xmlhttp.send();
}

function deleteRes(data)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?deleteRes="+data, true);
  xmlhttp.send();
}

function cancelRes(data)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?cancelRes="+data, true);
  xmlhttp.send();
}