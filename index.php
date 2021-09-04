<?php
	session_start();
	include('function.php');
?>
<html>
	<head>
		<meta charset="utf-8">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/bootstrap.css" rel="stylesheet">
    		<link href="css/main.css" rel="stylesheet">
				<link rel="stylesheet" href="css/datepicker.css">
					<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

       	<script src="js/bootstrap-datepicker.js"></script>
		
	</head>
	<!-- Вход -->

	<div class="container-fluid">
	<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Вход: </h4>
        </div>
        <div class="modal-body">
					<div class="form-group">
						<label>Потребителско име: </label>
						<input class="form-control" id="luser" name="Username" type="text"/>
					</div>
					<div class="form-group">
						<label>Парола: </label>
						<input class="form-control" id="lpass" name="Password" type="password"/>
					</div>
					<p id="login_error" style="color: red;"></p>
					<button class="btn btn-primary btn-block" onclick="login_account()">Вход</button>
        </div>
      </div>
    </div>
	</div>
</div>

	<!-- Регистрация -->
	<div class="container-fluid">
	<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Регистрация</h4>
        </div>
        <div class="modal-body">
					<center><h3 id="successReg"></h3></center>
					<div class="form-group">
						<label>Потребителско име: </label>
						<input class="form-control" id="username" name="Username" onkeyup="user_check(this.value)" type="text"/>
						<p id="user"></p>
					</div>
					<div class="form-group">
						<label>Парола: </label>
						<input class="form-control" id="password" name="Password" onkeyup="pass_check()" type="password"/>
						<p id="pass"></p>
					</div>
					<div class="form-group">
						<label>Повтори паролата: </label>
						<input class="form-control" id="password1" name="Password1" onkeyup="pass_check()" type="password"/>
						<p id="pass1"></p>
					</div>
					<button class="btn btn-primary btn-block" id="regist" onclick="submitReg()" disabled>Регистрация</button>
        </div>
      </div>
    </div>
	</div>
</div> 

<script>(function(){var pp=document.createElement('script'), ppr=document.getElementsByTagName('script')[0]; stid='K2VmVm9iamZkN1JpV3p4Z1RRQnJxQT09';pp.type='text/javascript'; pp.async=true; pp.src=('https:' == document.location.protocol ? 'https://' : 'http://') + 's01.live2support.com/dashboardv2/chatwindow/'; ppr.parentNode.insertBefore(pp, ppr);})();</script>


	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#options">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#options1">
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
					</button>
        </div>
        <div class="collapse navbar-collapse navbar-left" id="options">
					<ul class="nav navbar-nav">
						<li><a id="home" href="#"><b> Начало </b></a></li>
						<li><a id="photo" href="#"><b> Фотограф </b></a></li>
						<li><a id="reserve" href="#"><b> Резервация </b></a></li>
					</ul>
        </div>
				<div class="collapse navbar-collapse navbar-right" id="options1">
					<ul class="nav navbar-nav">
						<?php
							include('loginNav.php');
						?>
					</ul>
        </div>
      </div>
  </div>
    </nav>
    
		<div id="reservationModal" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		    	<div class="container-fluid">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Списък с резервации</h4>
		      </div>
		      
		      <div class="modal-body">
		        <table class="table">
							<thead>
								<tr>
									<th>Име</th>
									<th>Дата</th>
									<th>Телефон</th>
									<th>Email</th>
									<th>Име на фотографа</th>
									<th>Опции</th>
								</tr>
							</thead>
							<tbody id="bod">

							</tbody>
						</table>
		      </div>
		  </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Затвори</button>
		      </div>
		    </div>
		  </div>
		</div>
	

			
			<div id="reservedModal" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		    	 <div class="container-fluid">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Резервиран списък</h4>
		      </div>
		     
		      <div class="modal-body">
		        <table class="table">
							<thead>
								<tr>
									<th>Име</th>
									<th>Дата</th>
									<th>Телефон</th>
									<th>Email</th>
									<th>Име на фотографа</th>
									<th>Опции</th>
								</tr>
							</thead>
							<tbody id="bod1">
							</tbody>
						</table>
		      </div>
		  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Затвори</button>
		      </div>
		    </div>
		  </div>
		</div>
	

			<a name="home"></a>

		<div class="container-fluid" style="padding: 0;">
			<div id="myCarousel" class="carousel slide">
	  	<!-- Слайдшоу -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Снимки за слайдшоу -->
		    <div class="carousel-inner">
		      <div class="item active">
		        <div class="fill" style="background-image:url('img/11.jpg');"></div>
		        <div class="carousel-caption">
		          <h1>Модерно</h1>
		        </div>
		      </div>
		      <div class="item">
		        <div class="fill" style="background-image:url('img/22.jpg');"></div>
		        <div class="carousel-caption">
		          <h1>Елегантно</h1>
		        </div>
		      </div>
		      <div class="item">
		        <div class="fill" style="background-image:url('img/44.jpg');"></div>
		        <div class="carousel-caption">
				 <h1>Професионално</h1>
		        </div>
		      </div>
		    </div>

		    <!-- Контроли за слайдшоу -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="icon-prev"></span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="icon-next"></span>
		    </a>
			</div>
		</div>
	<a name="photo"></a>
	<div class='photographer-section container-fluid'>
		<h1 class="text-center">Наши фотографисти</h1>
			<div class="col-md-2 col-md-offset-1 photographer-profile">
				
				<h2 class="text-center">Lorem İpsum</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				
			</div>
			<div class="col-md-8">
				<div class="photographer" style="background-image: url('img/33.jpg');">
				</div>
			</div>

			<div class="col-md-2 col-md-offset-1 photographer-profile">
				
				<h2 class="text-center">Lorem İpsum</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				
			</div>
			<div class="col-md-8">
				<div class="photographer" style="background-image: url('img/33.jpg');">
				</div>
			</div>

	</div>
	
   <div class="reservation">
	<a name="reserve"></a>
	<div class="col-md-6 col-md-offset-3 text-center " >
		
		<h2>Резервация</h2>
		<div class="form-limit">
			<form>
				<div id="name-group" class="form-group ">
					<label class="control-label " for="name">
						Имена
					</label>
					<input class="form-control" id="name" name="name" type="text" autocomplete="off"/>
				</div>
				<div id="email-group" class="form-group ">
					<label class="control-label" for="email">
						Email
					</label>
					<input class="form-control" id="email" name="email" type="text" autocomplete="off"/>
				</div>
				<div id="number-group" class="form-group ">
					<label class="control-label " for="number">
						Телефон
					</label>
					<input class="form-control" id="number" name="number" pattern="^[0-9]{6}|[0-9]{8}|[0-9]{10}$" type="text" autocomplete="off"/>
				</div>
				<div id="photographer-group" class="form-group ">
					<label class="control-label" for="select">
						Изберете фотографист
					</label>
					<select class="select form-control" id="photographer" name="photographer">
						<?php comboFill(photographer_table); ?>
					</select>
				</div>
				<span id="dateWarning"></span>
				<div id="date-group" class="form-group ">
					<label class="control-label" for="date">
						Избор на дата
					</label>
					<div class="input-group">
						<div class="input-group-addon">
				 			
						</div>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" autocomplete="off"/>
					</div>
				</div>
				<div class="form-group">
					<div>
						<button class="btn btn-primary " name="submit" id="submit">
				 			Submit
						</button>
					</div>
				</div>
			</form>
		</div>
		
	</div>
</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/register.js"></script>
	<script src="js/login.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>
	<script src="js/main.js"></script>
<script> 

$(document).ready(function(){
    $(function(){
        var date_input=$('input[name="date"]');
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true
        })
    });
})



</script>
</body>
</html>
