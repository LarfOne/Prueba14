<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body img src="imagen/login.jpg">
 <div class="container">
  
 	<div class="header">
   <div class="login-logo">
    <img src="imagen/ratonAzul2.png"
        class="img-responsive" style="padding:0px 100px 0px 110px">
  </div>
 		<h3>Ingrese al Sistema</h3y>
 	</div>
 	<div class="main">

 		<form method="post">
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="text" placeholder="Usuario" name="ingUser">
 			</span><br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="Contraseña" name="ingPassword">
 			</span><br>
      
      <div class="row">
        
        <button>Ingresar</button>
        
      </div>


    <?php
       
       $login = new ControllerUser();
       $login->ctrLoginUser();
    ?>

 		</form>

 	</div>
 </div>
</body>
</html>