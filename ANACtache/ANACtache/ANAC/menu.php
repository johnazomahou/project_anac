
<ul class="nav nav-list" style="background-color:#03224c;color:white">

					

        	  <!-- les Utilisateur_Power autres personnel ANAC nont pas droit a ce menu atterisent diretement sur MES TACHES -->
					  <!--MAIS LES AUTRES USERS ON DROIT A C EMEENU-->

        <?php if ($_SESSION['user']['profil']!=='Utilisateur_Power' ) {?>

					<li class="" style="background-color:#03224c;color:white">
						<a href="back_office.php" style="background-color:#03224c;color:white">
							<i class="menu-icon fa fa-tachometer" style="background-color:#03224c;color:white"></i>
							<span class="menu-text" >
								<b style="background-color:#03224c;color:white">Tableau de Bord</b> </span>
						</a>

						<b class="arrow"></b>
					</li>
<?php }?>
				


		
					<!--LES Utilisateur_Power ET LES CONSULTANT  NONT PAS DROIT A C MENUS SAUF LES ADMINS  et  Super_Utilisateur-->
		<!--ICI ON CREE LE MENUS ACCESSIBLES PAR LES =Administrateur-->

                 <?php if ($_SESSION['user']['profil']=='Administrateur') {?>
                 	

					<ul class="nav nav-list" >
					
					<li class="" >
						<a href="#" class="dropdown-toggle" style="background-color:#03224c;color:white">
							
						<i class="ace-icon glyphicon glyphicon-time" ></i>
						<i class="menu-icon fa fa-desktop"></i>
<span title="Gestion des tâches" class="menu-text"> 
								<b style="background-color:#03224c;color:white">Gestion Tâches </b> </span>


							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="">
								<a href="suivi_taches.php">
									<i class="menu-icon fa fa-caret-right" style="background-color:#03224c;color:white"></i>
									<b style="color:#03224c">Attribuer Tâche à un Agent</b>
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="suivi_taches_attribuer_plusieures_personnes.php">
									<i class="menu-icon fa fa-caret-right" style="background-color:#03224c;color:white"></i>
									<b title="Pour attribuer la tâche à Plusieures personnes" style="color:#03224c">Attribuer Tâche  Plusieures Agents</b>
								</a>

								<b class="arrow"></b>
							</li>

							
				

								</ul>
							</li>
						</ul>
					</li>

<?php }?><!--FIN DU MENU GESTION DES TACHES Administrateur-->

					
					<li class="">
						<a href="../index.php" style="background-color:#03224c;color:white">
							<i class="glyphicon glyphicon-lock"></i>
							<span class="menu-text">
								<b style="background-color:#03224c;color:white">Se Déconnecter</b> </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->