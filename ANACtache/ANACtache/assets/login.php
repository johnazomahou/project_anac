<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>ANACtache</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="shortcut icon" href="images/faviconLOGOANAC.ico" type="image/vnd.microsoft.icon" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<!--IMAGE DE FOND-->
		<div class="container-login100" style="background-image: url('images/LOGOANAC.png');">
			<div class="wrap-login100">
			


<form class="login100-form validate-form"  name="form1" action="../ANAC/seConnecter.php" method="POST">
				
					

					<span class="login100-form-logo">
						<center> <img style="width:160px;height:105px" src="images/LOGOANAC.png"></center><br>
					</span>

					<style>
.clignote {
  color:white;
  animation: clignote 5s linear infinite;
}
@keyframes clignote {  
  50% { opacity: 0; }
}
</style>


					<span class="login100-form-title p-b-34 p-t-27">
						<h3 class="clignote" style="text-decoration: blink;"> <I><font face="candara" >Authentification à  ANACtache</font></I> </h3>
					</span>
					<img style="width:70px;height:50px" src="images/loginavatar.png" class="img-responsive img-rounded" />
					<?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>

					<div class="wrap-input100 validate-input" data-validate = "Entrer un N°  de Matricule" autofocus>
						<input class="input100" onkeypress="return keyPressHandler (event);" type="text" maxlength="4" name="numat" placeholder="Saisir votre Matricule ANAC">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input"  data-validate="Entrer un mot de passe">
						<input class="input100" type="password"  name="pwd" placeholder="Saisir votre mot de passe">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						
						<label  >
							
						</label>
					</div>

				
                     <div class="login-social-link centered" style="text-align: center;">

                            <button class="btn" style="background-color:red;color:white" type="reset">Annuler</button>
                            <button type="submit" class="btn btn-success">
                                                <span class="glyphicon glyphicon-log-in"></span>
                                                Se connecter
                            </button>

                        </div>
                        	<br/><br/>
					
						<center><font face="Candara" FONT size="3" ><i style="color:white;font-weight:bold">Système Centralisé de Gestion des Courriers et d'Activités. </i> </font></center><br/>

						
					<CENTER>	
						<font face="Candara" FONT size="4" >
							<b style="color:white;font-weight:bold">ANACtache V2.1 © 2023 ANAC-GABON </b> 
					  </font>
					</CENTER>  
				</form>
			</div>
		</div>
	</div>
	
							
							
						
						
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	

<script type="text/javascript">
        function isNumeric (value)
            {
                return (/(^\d+$)|(^\d+\.\d+$)/).test (value);
            }
 
        /*    Gestion du onKeyPress.
            "event" est passé automatiquent par le browser à la fonction (sauf dasn le cas de IE, voir plus bas).
            Dans le cas d'un evenement JavaScript, le fait de retourner false (FAUX) stop le processus lié à celui-ci, ce qui dans notre cas empeche le caractere d'être saisie !
        */
        function keyPressHandler (event)
            {
                event = event || window.event;    // si event n'existe pas, on est sous IE, et pour IE un evenement est global...
                var car = String.fromCharCode (event.charCode || event.keyCode); // charCode pour le standards ou keyCode pour IE
                return isNumeric (car);  // isNumeric renvoit vrai s'il s'agit d'un chiffre, or nous ne voulons pas de chiffres, donc nous inversons le résultat avec un "!".
            }
    </script>

</body>
</html>