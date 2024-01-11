	
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ANACtache</title>
		
		<link rel="shortcut icon" href="../assets/img/faviconLOGOANAC.ico" type="image/vnd.microsoft.icon" />
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/fonts/fonts.googleapis.com.css" />
			<link rel="stylesheet" href="../assets/css/chosen.min.css" />
		<link rel="stylesheet" href="../assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>
		

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>

		<!--POUR INSERER LES COURBES DE GRAPHE-->
		<!--<script type="text/javascript" src="jsgraph/jquery.min.js"></script>-->
		<script type="text/javascript" src="jsgraph/Chart.min.js"></script>

<link rel="stylesheet" href="bootstrap-select/dist/css/bootstrap-select.min.css"> <!--  CE FICHIER PERMET DE FAIRE LA RECHERCHE SEMI SAISIE AUTOMATIQUE LISTE DEROULANTE -->
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default" style="background-color:#03224c;color:white">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				

				<div class="navbar-header pull-left">
					<a class="navbar-brand">
						<small>
							<i>  
								
									<img  title=" "
										style="width:80px;height:60px;margin-top:-20px;margin-left:-10px"
										   img src="../assets/images/LOGOANAC.PNG ">




							</i>


							&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
							&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp 
							
					<CENTE><font face="Candara" FONT size="3" ><B>SYSTEME CENTRALISE DE GESTION DES COURRIERS ET D'ACTIVITES.</B>  </font>  



							
							
						</small>
					</a>


					
						
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation" >
					<ul class="nav ace-nav" >
				
						<li class="light-blue" >
							<a data-toggle="dropdown" href="#" class="dropdown-toggle" style="background-color:#03224c;color:white">
								<img class="nav-user-photo" src="../assets/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenue,</small>
									<i><b><?php echo  ' ' .$_SESSION['user']['prenag']?> 
                                        <?php echo  ' ' .$_SESSION['user']['nomag']?> </span></i></b>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								<li>
									<a">
										<i class="ace-icon fa fa-user"></i>
										<i><b><?php echo  ' ' .$_SESSION['user']['prenag']?> 
                                        <?php echo  ' ' .$_SESSION['user']['nomag']?> </span></i></b>
									</a>
								</li>

								<!--<li>
									<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['numat'] ?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>-->

								<li class="divider"></li>

								<li>
									<a href="../index.php">
										<i class="ace-icon fa fa-power-off"></i>
										Se Déconnecter
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>


					


		