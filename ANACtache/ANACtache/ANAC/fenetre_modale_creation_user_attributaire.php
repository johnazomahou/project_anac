
<!--FENETRE MODAL POUR  reiINSCRIRE LES ELEVES-->

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog  modal-lg">
  <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
   <div class="modal-header" style="background-color:#03224c;color:white">
    <div class="modal-header no-padding">
  <div class="table-header" style="background-color:#03224c;color:white">
    Fiche de création des Utilisateurs  pour suivi  des tâches 
  </div>  
  </div>

   </div>
   <div class="modal-body">

      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group has-success has-feedback">
          <label class="col-sm-2 control-label"><font color="white"> Utilisateur<i style="color:red;font-weight:bold">*</i>:</font></label>
                                                     <div class="col-sm-10">
                                                      
                                                   

                                                     


                                                             <select  id ="idattributeur" title="Choissisez Attributaire comme Utilisateur de ANACtache"   style="color:black;font-weight:bold" class=" form-control selectpicker show-tick " data-size="20"  data-header="Selectionner Attributaire   comme Utilisateur" data-live-search="true" data-style="btn-danger" required="required" class="form-control" name="idattributache"  data-rel="chosen" >


                                                            
                                                         <?php
                                                                  while ($data2 = mysqli_fetch_assoc($requete_attributeurtache)) {
                                                                            ?>
                                                                    <option value="<?php echo $data2['idattributeur'];?>"
                                                                    data-idattributeur="<?php $data2['idattributeur'];?>"
                                                                    data-nomattributeur="<?php echo $data2['nomattributeur'];?>" 
                                                                   
                                                                     data-testidag="<?php echo $data2['idattributeur'];?>">
                                                                            
                                                            <?php echo $data2['nomattributeur'];?>  
                                                             
                                                                   
                                                                         </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>


                                                    
                                                    <div class="col-sm-4">
                                                     

                                                    </div>

  
    </div>
    
            <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label"><font color="white">Nom Session:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                     <input type="text" name="nomag" id="nomattributeur" readonly="true"  style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>


                                                    <label class="col-sm-2 control-label"><font color="white">Nature Compte<i style="color:red;font-weight:bold">*</i>:</font></label>
                                                    <div class="col-sm-4">
                                                       <div class="radio">
                                                    <label>
                                                        <input name="pconnexion" checked="checked" value="1"  type="radio" class="ace" />
                                                        <span class="lbl"> Compte Activé</span>
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input name="pconnexion" value="0" type="radio" class="ace" />
                                                        <span class="lbl" style="color:red;font-weight:bold"> Compte Désactivé</span>
                                                    </label>
                                                </div>

                                                    </div>

  
    </div>

                  <div class="form-group has-success has-feedback">
                            <label class="col-sm-2 control-label"><font color="white">Prenom Session:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                    <input type="text" name="prenag" placeholder="Pas Obligatoire"   style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>


                                                    <label class="col-sm-2 control-label"><font color="white">Login de connexion<i style="color:red;font-weight:bold">*</i>:</font></label>
                                                    <div class="col-sm-4">

                                                  <input type="text"  onkeypress="return keyPressHandler (event);" type="text" maxlength="4" name="numat" placeholder="Saisir Matricule ANAC Personnel"  style="color:black;font-weight:bold" title="Code Identifiant" required="required"   class="form-control" >

                                                    </div>

  
    </div>


     

   
      

    <div class="form-group has-success has-feedback">

            <label class="col-sm-2 control-label"><font color="white">Profil du Compte<i style="color:red;font-weight:bold">*</i>:</font></label>
                                                     <div class="col-sm-4">
                                                  

    <!--LES AUTRES USER NONT PAS DROIT A C FONCTIONNALITE SAUF LES ADMINS-->
          <!--ICI ON CREE LE FONCTIONNALITE ACCESSIBLES PAR LES =ADMISN-->

              

                                                  <div class="radio">
                                                    <label>
                                                <input name="profil"  value="Administrateur"  type="radio" class="ace" />
                                                        <span class="lbl" style="color:yellow;"> Directeurs</span>
                                                    </label>
                                                </div>
          

                                                <div class="radio">
                                                    <label>
                                                <input name="profil"  value="Administrateur"  type="radio" class="ace" />
                                                        <span class="lbl" style="color:yellow;"> Assitante Direction</span>
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input name="profil"  value="Super_Utilisateur" type="radio" class="ace" />
                                                    <span class="lbl" style="color:yellow;"> Chefs de Services</span>
                                                    </label>
                                                </div>


                                                <div class="radio">
                                                    <label>
                                                        <input name="profil"  value="Super_Utilisateur" type="radio" class="ace" />
                                                    <span class="lbl" style="color:yellow;"> Chefs de Bureaux</span>
                                                    </label>
                                                </div>

                                                

                                                <div class="radio">
                                                    <label>
                                               <input name="profil" checked="checked" value="Utilisateur_Power" type="radio" class="ace" />
                                                        <span class="lbl" style="color:yellow;"> Autre personnel(Cadre etc..)</span>
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input name="profil" value="Consultant" type="radio" class="ace" />
                                                    <span class="lbl" style="color:yellow;"> Consultant</span>
                                                    </label>
                                                </div>

                                                
                                                   
                                                    </div>

                          <label class="col-sm-2 control-label"><font color="white">Trigramme :</font></label>
                                                     <div class="col-sm-4">
                                                           <input type="text"  name="trigram_user" placeholder="Pas Obligatoire"     style="color:black;font-weight:bold" class="form-control" id="typecli" >
                                                      <br />

                                                   
                                                    </div>

  
    </div> 

    

    
 

    


                                        <!--LES CHAMPS A MASQUER pour inserer dans la bdd-->


       <!--CHAMP A MASQUER-->
                                        <!--LE MOT DE PASSE PAR DEFAUT DES TOUS LES UTILISATEUR EST  1234-->
                                    <input type="hidden"  name="pwd"  VALUE="81dc9bdb52d04dc20036dbd8313ed055">

                

                             
     <input type="submit" name="Enregistrer"  value="Enregistrer"  class="btn btn-success" />
     
    </form>
               

        <?php

            include('../param_connexion_bdd/connexiobddAJAX.php');

            include('../param_connexion_bdd/fonction_ADD_user_attribuataire.php');


    if (isset($_POST['Enregistrer'])){


       if (isset($_POST['numat'], $_POST['idattributache'])) {

                  $numat=$_POST['numat'];
            
                  $idattributache=$_POST['idattributache'];

                  if(verifie_numat_attributaire($numat,$idattributache)){



                echo "<script> alert('Utilisateur ayant le Login " .$numat." existe deja, Veuillez reessayer !') </script>";
            }

            else{
                
                   $succes=ajouter_user_attributaire('$numat','$pwd','$profil','$pconnexion','$nomag',
                                                     '$prenag','$trigram_user','$idattributache');

            }


        }
    }
    ?>



   </div>
   <div class="modal-footer">
    </h5></CENTER>
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>

    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
  </div>
 </div>
</div>


