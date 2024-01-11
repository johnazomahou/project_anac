
<!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_personnel">
                          <div class="modal-dialog  modal-lg">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement du Personnel Aéronautique</h4>


                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                
                              </div>
                              <div class="modal-body"> 
                
                                <div class="message_afficher_personnel"></div>
                
                               

                                   <form action="save_ajax_modale.php" class="save-personnel" method="POST"> 
                
                                   
<div class="form-group has-success has-feedback">

           <label class="col-sm-2 control-label"><font color="white">Type Personnel:</font></label>
                                                     <div class="col-sm-4">
                                                       
                                                  
                                                  <select  id="idtypepersoaero" class="form-control" name="idtypepersoaero" style="color:black;font-weight:bold"   data-rel="chosen">
                                                             <option value="">Choisir Catégorie </option>

                                                         <?php
                                                                while ($data2 = mysqli_fetch_assoc($req812345)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idtypepersoaero'];?>"
                                                                            data-idtypepersoaero="<?php $data2['idtypepersoaero'];?>"
                                                                                               
                                                                            data-nom_typpersoaero="<?php echo $data2['nom_typpersoaero'];?>"
                                                                            data-testidag="<?php echo $data2['idtypepersoaero'];?>">
                                                                            <?php echo $data2['nom_typpersoaero'];?>      </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>

              <label class="col-sm-2 control-label"><font color="white">Genre:</font></label>
                                                     <div class="col-sm-4">
                                                      <div class="radio">
                              <label>
                              <input name="sexe" checked="checked" value="Masculin"  type="radio" class="ace" />
                              <span class="lbl" style="color:white;font-weight:bold"> Masculin</span>
                              </label>

                              <label>
                              <input name="sexe" value="Feminin" type="radio" class="ace" />
                              <span class="lbl" style="color:white;font-weight:bold"> Feminin</span>
                              </label>

                            </div>
                                                    </div>
                                       
                                              



                                                   

             </div> <br/> <br/> 

      
            <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Nom:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                    <input type="text" name="nompersoaero"  placeholder="Obligatoire" required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                <label class="col-sm-2 control-label"><font color="white">Prénom:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="prenompersoaero" placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

             </div><br/> <br/> <br/> 

             <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Date de Naissance:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                   
                                                    <input type="date"  name="datenaispersoaero"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                    <label class="col-sm-2 control-label"><font color="white">Lieu de Naissance:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="lieunaispersoaero"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

             </div> <br/> <br/> <br/>


            <div class="form-group has-success has-feedback">
                                          <label class="col-sm-2 control-label"><font color="white">Adresse:</font></label>
                                                     <div class="col-sm-4">
                                                       

                                                  <input type="text"  name="adresspersoaero"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>

                                              <label class="col-sm-2 control-label"><font color="white">Télephone:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                               <input type="text"  name="telpersoaero"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

             </div> <br/> <br/> <br/>

             <div class="form-group has-success has-feedback">
                                          <label class="col-sm-2 control-label"><font color="white">Centre Affectation:</font></label>
                                                     <div class="col-sm-4">
                                                       
                                                  
                                                   <select  id="centre_affectation" class="form-control"  style="color:black;font-weight:bold"  name="centre_affectation"  data-rel="chosen">
                                                             <option value="">ND </option>
                                                              <option value="Libreville">Libreville </option>
                                                               <option value="Port-Gentil">Port-Gentil </option>
                                                                <option value="Lambaréné">Lambaréné </option>
                                                                <option value="Mouila">Mouila </option>
                                                                <option value="Makokou">Makokou </option>
                                                                <option value="Oyem"> Oyem</option>
                                                                <option value="Franceville">Franceville </option>
                                                                <option value="Moanda">Moanda </option>
                                                                <option value="Tchibanga">Tchibanga </option>
                                                                <option value="Koula-Moutou"> Koula-Moutou</option>
                                                                
                                                       
                                                        </select>
                                                    </div>

                                            <label class="col-sm-2 control-label"><font color="white">Nationalité:</font></label>
                                                     <div class="col-sm-4">
                                                      
                <select   id="IDPAYS" style="color:black;font-weight:bold" class="form-control" name="IDPAYS"  data-rel="chosen" >
                                                           <option value="">Choisir Nationalité</option>
                                                         <?php
                                                                while ($data2 = mysqli_fetch_assoc($req81)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idpays'];?>"
                                                                            data-idpays="<?php $data2['idpays'];?>"
                                                                                                
                                                                            data-nompays="<?php echo $data2['nompays'];?>"
                                                                            data-testidag="<?php echo $data2['idpays'];?>">
                                                                            <?php echo $data2['nompays'];?>      </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>

                                                    </div>



                                                   

             </div> <br/> <br/> <br/>

             <div class="form-group has-success has-feedback">
                                          <label class="col-sm-2 control-label"><font color="white">Organisme:</font></label>
                                                     <div class="col-sm-4">
                                                       
                                                  
              <select  id="idorga" class="form-control" name="idorga" style="color:black;font-weight:bold"   data-rel="chosen">
                                                             <option value="">Choisir Organisme </option>

                                                         <?php
                                                                while ($data2 = mysqli_fetch_assoc($req8123)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idorga'];?>"
                                                                            data-idorga="<?php $data2['idorga'];?>"
                                                                                               
                                                                            data-nomorga="<?php echo $data2['nomorga'];?>"
                                                                            data-testidag="<?php echo $data2['idorga'];?>">
                                                                            <?php echo $data2['nomorga'];?>      </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>

                                          <label class="col-sm-2 control-label"><font color="white">Spécialité:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                               <select  id="idspecialite" class="form-control" name="idspecialite" style="color:black;font-weight:bold"   data-rel="chosen" >
                                                             <option value="">Choisir Spécialité </option>

                                                         <?php
                                                                while ($data2 = mysqli_fetch_assoc($req81234)) {
                                                                    ?>
                                                                          <option value="<?php echo $data2['idspecialite'];?>"
                                                                            data-idspecialite="<?php $data2['idspecialite'];?>"
                                                                                               
                                                                        data-nomspecialite="<?php echo $data2['nomspecialite'];?>"
                                                                        data-testidag="<?php echo $data2['idspecialite'];?>">
                                                                            <?php echo $data2['nomspecialite'];?>      </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>

                                                    </div>



                                                   

             </div> <br/> <br/> <br/>


             

             <div class="form-group has-success has-feedback">

              <label class="col-sm-2 control-label"><font color="white">E-mail:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                           <input type="text" name="mailpersoaero"  placeholder="Pas Obligatoire" style="color:black;font-weight:bold"    class="form-control" >

                                                    </div><BR>



<!--extraction le numero IDUSER de celui qui se connecter,qui enregistre dans la bdd-->
                             <input type="hidden"  name="iduser"  value="<?php echo $stat8['numat']; ?>">
                             
                             <!--pour desactiver un PERSONNEL POUR SAVOIR SIL EST PARTI, DECEDE,LICENCIER OU AUTRE-->

       <input type="hidden"  name="personel_partie"  value="Actif"   >

 <!--pour SAVOIR SI LE PERSONNEL A DEJA UN AGREMA  TRE - CRE-FE CPNT-->
        <input type="hidden"  name="statut_personnel_agrema_pnt"  value="Pas_encore_agrement_pnt"   >

         <!--pour SAVOIR SI LE PERSONNEL A DEJA UN AGREMA  TRE - CRE-FE CPNT-->
        <input type="hidden"  name="statut_personnel_agrema_pnt_cel"  value="Pas_encore_agrement_pnt_CEL"   >

    <!--pour SAVOIR SI LE PERSONNEL A DEJA UN AGREMA  TRE - CRE-FE CPNT-->
        <input type="hidden"  name="statut_personnel_agrema_pnt_ael"  value="Pas_encore_agrement_pnt_AEL"   >
    
                                      <!--POUR INSERER LA DATE DU JOUR ET LHEUR DE CREATION, il faut faire moins 1h-->
              <input type="hidden" name="dateheuresaisi"  value="<?php echo $date=date('d-m-Y' );?> à <?php echo  date("H:i:s");?>" style="color:blue;font-weight:bold"/>

                       <!--POUR SAVOIR SI LE PERSONNEL EST DEJA SUIVI,on lui attribué une licence-->
                             <input type="hidden"  name="statut_personnel"  value="Pas encore suivi">

                              <!--POUR SAVOIR SI LE PERSONNEL EST pour dire quil est deja examinateur-->
                             <input type="hidden"  name="statut_personel_examinateur"  value="Pas encore Examinateur">

                             <!--POUR SAVOIR SI LE PERSONNEL EST pour dire quil est deja instructer-->
                             <input type="hidden"  name="statut_personel_instructeur"  value="Pas encore Instructeur">
                            


                                         
                                                     <div class="col-sm-6">
                                                       
                            
                                                <button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button>
                                                 
                                                    </div><BR>

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->



<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->


<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-personnel').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_personnel').html("<span style='color: red; text-align: center;font-size: 18px'>Personnel existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#personnelr-select-card').html(response); 
                    //$('#idpilote').html(response);
                    $('.message_afficher_personnel').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Personnel ajouté avec succès.Fermer la Fênetre.</span>");
                    //$(this).html("<span style='font-size:25px; text-align:center; color:green'>Votre pilote a été ajouté</span>")

                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->


<!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_emetteur">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Enregistrement d'un Emetteur/Expediteur</h4>
                              </div>
                              <div class="modal-body"> 
							  
                                <div class="message_afficher_emetteur"></div>
								
                                <form method="POST" class="save-emetteur" action="save_ajax_modale.php">
								
                                    <label>Emetteur/Expediteur:<i style="color:red;font-weight:bold">*</i>:</label>
                                    <input type="text"  VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" name="nomemetteur" placeholder="Obligatoire" class="form-control rounded-0" style="color:#2060a6;background-color:white;font-weight:bold"  required="required"> 
                                    
								
										<!--extraction le numero IDUSER de celui qui se connecter,qui enregistre dans la bdd-->
										<input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">
										<input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>"/>

									<br/>
										
										
										<button style="background-color:green; color: white; height: 40px" type="submit" >
											<span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
											Enregistrer
										</button>
                                </form>
								
                              </div>
                              
								<div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
							  
							  
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->

<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->



<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-emetteur').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_emetteur').html("<span style='color: red; text-align: center;font-size: 18px'>Emetteur/Expediteur existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#Emetteur-select-card').html(response); 
                    //$('#idpilote').html(response);
                    $('.message_afficher_emetteur').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Emetteur/Expediteur ajouté avec succès.Fermer la Fênetre.</span>");
                    //$(this).html("<span style='font-size:25px; text-align:center; color:green'>Votre pilote a été ajouté</span>")

                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->


 <!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_DOMAINE">
                          <div class="modal-dialog  modal-lg">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement des Domaines</h4>
                                
                              </div>
                              <div class="modal-body"> 
                
                                <div class="message_afficher_domaine"></div>
                
                               

                                   <form action="save_ajax_modale.php" class="save-domaine" method="POST"> 
                
            <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Nom du Domaine:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                    <input type="text" name="nomdomaine"  placeholder="PEL" required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >
                                                    </div>

                                                <label class="col-sm-2 control-label"><font color="white">Libellé:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="libel_domaine" placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

             </div><BR><BR><BR><BR>
                                <div class="col-sm-6">
                                                       
                            
                                                <center><button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button></center>
                                                 
                                  </div><BR><BR><BR>

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->



<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->
<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-domaine').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_domaine').html("<span style='color: red; text-align: center;font-size: 18px'>Ce domaine existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#Domaine-select-card').html(response); 
                    //$('#idpilote').html(response);
                    $('.message_afficher_domaine').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Domaine enregistré avec succès.Fermer la Fênetre.</span>");
                    //$(this).html("<span style='font-size:25px; text-align:center; color:green'>Votre pilote a été ajouté</span>")

                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->




            
            
            <!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_type_aeronef">
                          <div class="modal-dialog  modal-lg">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement des Aéronèfs</h4>
                                
                              </div>
                              <div class="modal-body"> 
                
                               
                
                               
                                <div class="message_afficher_type_aeronef"></div>
                                  
        <form action="save_ajax_modale.php" class="save-type-aeronef" method="POST"> 
                
                                   
<div class="form-group has-success has-feedback">

           <label class="col-sm-2 control-label"><font color="white">Type/Modèle de l'Aéronèf
                         <i style="color:red;font-weight:bold">*</i>:</font></label>
                                                     <div class="col-sm-4">
                                                       
                                                  
                                                  <input type="text" name="nomaeronef"  placeholder="Obligatoire" required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >
                                                    
                                                    </div>

              <label class="col-sm-2 control-label"><font color="white">Nature de l'Appareil:</font></label>
                                                     <div class="col-sm-4">
                                                      <div class="radio">
                               <input type="radio"  name="drone" title="Drone" id="Drone" value="OUI" onClick="saisieinactive()"  />
                                                            <label for="Drone"> <b style="color:yellow;font-weight:bold">Cet appareil est un drone</b> </label><br/>


                                                            <!--SI AVEC Pas_Drone il INSER LE NUMERO Pas_Drone-->
                                     <input type="radio" name="drone" title="Pas_Drone" id="Pas_Drone" value="NON" onClick="saisieactive()" checked="checked"  />
                                                        <label for="Pas_Drone" id="textePas_Drone"><b style="color:yellow;font-weight:bold">Cet appareil n'est pas un drone</b></label>
                                                        

                            </div>
                                                    </div>
                                       
                                              



                                                   

             </div> <br/> <br/> 

      
            <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Immatriculation:
                                               <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                      
                                                    <input type="text" name="immataeronef"  VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" placeholder="Obligatoire" required="required" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:black;font-weight:bold"    class="form-control" >
                                                    
                          </div>

                                                <label class="col-sm-2 control-label"><font color="white">Catégorie du Drone:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="nbremoteur" placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"   VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();"  class="form-control" >

                                                    </div>



                                                   

             </div><br/> <br/> <br/> 

             <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">N°Série Aéronèf:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                   
                                                    <input type="text"  name="numserie"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"  VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();"   class="form-control" >
                                                    </div>

                                                    <label class="col-sm-2 control-label"><font color="white">Tonnage de l'Aéronèf:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="tonnage" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    class="form-control" >

                                                    </div>



                                                   

             </div> <br/> <br/> <br/>


            <div class="form-group has-success has-feedback">
                                          <label class="col-sm-2 control-label"><font color="white">Classe du Drone:</font></label>
                                                     <div class="col-sm-4">
                                                       

                                                  <input type="text"  name="enverugur"  placeholder="Pas Obligatoire"  style="color:black;font-weight:bold"    VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" class="form-control" >

                                                    </div>

                                             
                                                    </div>



                                                   

             </div> <br/>

            

             

             <div class="form-group has-success has-feedback">

             
                   <!--LES CHAMPS A MASQUER-->
                                                <!--extraction le numero matricule de celui qui se connecter-->
                                                    
                                        <input type="HIDDEN"  name="numat"  value="<?php echo $stat8['numat']; ?>"    style="color:blue;font-weight:bold"  class="form-control"  required="required">

                                                        <!--POUR INSERER LA DATE DU JOUR ET LHEUR DE CREATION, il faut faire moins 1h-->
                                            <input type="HIDDEN" name="datesaizi" readonly="true" value="<?php echo $date=date('d-m-Y' );?> à <?php echo  date("H:i:s", strtotime('now -1 Hour '));?>" style="color:blue;font-weight:bold" class="form-control" required="required" placeholder="" class="col-xs-10 col-sm-5" />

                                                     <div class="col-sm-6">
                                                       
                            
                                                <center><button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button></center>
                                                 
                                                    </div><BR> <br/> <br/>

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->



<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->


<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-type-aeronef').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_type_aeronef').html("<span style='color: red; text-align: center;font-size: 18px'>Ce Type Aéronèf et Immatriculation existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#TYPEAERONEF-select-card').html(response); 
                    //$('#idpilote').html(response);
                    $('.message_afficher_type_aeronef').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Type Aéronèf ajouté avec succès.Fermer la Fênetre.</span>");
                    //$(this).html("<span style='font-size:25px; text-align:center; color:green'>Votre pilote a été ajouté</span>")

                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->

            
          
          
            <!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_ORGANISME">
                          <div class="modal-dialog  modal-lg">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement des organismes</h4>
                                
                              </div>
                              <div class="modal-body"> 
                
                                <div class="message_afficher_organisme"></div>
                
                               

                                   <form action="save_ajax_modale.php" class="save-organisme" method="POST"> 
                
                                    
<div class="form-group has-success has-feedback">

           <label class="col-sm-2 control-label"><font color="white">Organisme: <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-4">
                                                       
                                                  <input type="text"  name="nomorga" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:blue;font-weight:bold"  placeholder="Obligatoire" class="form-control" id="nbreppe" required="required" >
                                                  
                                                    </div>

              <label class="col-sm-2 control-label"><font color="white">Trigramme:</font></label>
                                                     <div class="col-sm-4">
                                                      <input type="text" maxlength="3" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" name="trigrorganisme" placeholder="Facultatif" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe">
                                                        
                                                    </div>
                                       
                                              



                                                   

             </div> <br/> <br/> 

      
            <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">Lieu/base:
                                               </font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text"  name="lieuorga" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif" >
                                                        
                          </div>

                                                <label class="col-sm-2 control-label"><font color="white">Adresse:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                  <input type="text" name="adresorga" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:blue;font-weight:bold"  class="form-control" id="nbreoui" placeholder="Facultatif"  >
                                                       
                                                    </div>



                                                   

             </div><br/> <br/> 

             <div class="form-group has-success has-feedback">
                                               <label class="col-sm-2 control-label"><font color="white">N° Télephone:</font></label>
                                                     <div class="col-sm-4">
                                                       <input type="text"  name="telorga" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif"  >
                                                        
                                                   
                                                  
                          </div>

                                                    <label class="col-sm-2 control-label"><font color="white">E-mail:</font></label>
                                                     <div class="col-sm-4">
                                                      
                                                 <input type="text" name="emailorga"  style="color:blue;font-weight:bold"  class="form-control" id="nbreoui" placeholder="Facultatif"  >
                                                        
                                                    </div>



                                                   

             </div> <br/> <br/> 


            <div class="form-group has-success has-feedback">
                                          <label class="col-sm-2 control-label"><font color="white">N° Fax:</font></label>
                                                     <div class="col-sm-4">
                                                       

                                                   <input type="text"  name="faxorga" VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif"  >
                                                        
                                                    </div>

                                            
                                                    </div>



                                                   

             </div> <br/> <br/> 

            


             

             <div class="form-group has-success has-feedback">

                <input type="hidden"  name="datexpire" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif" >
                                                            <!--pour mettre la valeur par defaut dire que c vide-->
                                                            <input type="hidden"  name="idtypeorga"  value="66" style="color:blue;font-weight:bold" class="form-control" id="nbreppe" placeholder="Facultatif" >

                                                            <input type="hidden"  name="statutorga" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif" >

                                                            <input type="hidden"  name="cateoperater" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif" >

                                                               <input type="hidden"  name="siteactivite" style="color:blue;font-weight:bold"  class="form-control" id="nbreppe" placeholder="Facultatif" >

                                         
                                                     <div class="col-sm-6">
                                                       
                            
                                                <center><button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button></center>
                                                 
                                                    </div><BR> <br/> 

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->



<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->


<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-organisme').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_organisme').html("<span style='color: red; text-align: center;font-size: 18px'>Cet Organisme existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#ORGANISME-select-card').html(response); 
                    //$('#idpilote').html(response);
                    $('.message_afficher_organisme').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Organisme ajouté avec succès.Fermer la Fênetre.</span>");
                    //$(this).html("<span style='font-size:25px; text-align:center; color:green'>Votre pilote a été ajouté</span>")

                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->


            
             <!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_ATTRIBUTEUR">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement   Personnel(Responsable) Mise en eouvre</h4>
                                
                              </div>
                              <div class="modal-body"> 
                
                        <div class="message_afficher_ATTRIBUTEUR"></div>
                
                               

<form action="save_ajax_modale.php" class="Save-attributeur" method="POST"> 
                
                                    
<div class="form-group has-success has-feedback">

<label class="col-sm-2 control-label"><font color="white">Attributaire: <i style="color:red;font-weight:bold">*</i></font></label>
                                                     <div class="col-sm-9">
                                                       
                                                 
                         <textarea class="form-control rounded-0" style="color:#2060a6;background-color:white;font-weight:bold" required="required" name="nomattributeur"  VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" placeholder="Saisir  Personnel Mise en eouvre de la tâche" rows="3"></textarea></div><BR/><BR/><BR/><BR/><BR/><BR/>


<label class="col-sm-2 control-label"><font color="white">E-mail ANAC: <i style="color:red;font-weight:bold">*</i></font></label>
    
    <div class="col-sm-9">
                                                       
 <!-- ce champ quon recuper pour envyer les notifications par mail,lorsquon on envoi la tache-->
                         
<input type="email"  name="emailanac" placeholder="rufin.mbadinga@anac-gabon.com" required="required"   style="color:black;font-weight:bold;border-radius: 10px"    class="form-control" >




                         </div>


                                       
                                              



                                                   

             </div> <br/> <br/> <br/> <br/> <br/>

      
           
       





             

             <div class="form-group has-success has-feedback">

               
 <!--extraction le numero IDUSER de celui qui se connecter,qui enregistre dans la bdd-->
                  <input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">
          <input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>" />

                                         
										 
										 
 <!--POUR DIRE PAR DEFAUT QUE LA TACHE SERA ATTRIBUER A UN PERSONNEL ANAC-->
                  <input type="hidden"  name="personnelanac"  value="OUI">
				  
				  
                                                     <div class="col-sm-6">
                                                       
                            
                                                <center><button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button></center>
                                                 
                                                    </div><BR> <br/> 

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->




<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->


<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.Save-attributeur').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_ATTRIBUTEUR').html("<span style='color: red; text-align: center;font-size: 18px'>Attributeur existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#ATTRIBUTEUR-select-card').html(response); 
                    //$('#idpilote').html(response);
                    $('.message_afficher_ATTRIBUTEUR').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Attributeur ajouté avec succès.Fermer la Fênetre.</span>");
                    //$(this).html("<span style='font-size:25px; text-align:center; color:green'>Votre pilote a été ajouté</span>")

                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->







<!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_formulaire_use">
                          <div class="modal-dialog  modal-lg">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement des Formulaires a utiliser</h4>                  
                              </div>
                              <div class="modal-body"> 
                
                                <div class="message_afficher_formulaire_use"></div>
                
                                   <form action="save_ajax_modale.php" class="save-formulaireuse" method="POST"> 
                
                                   
<div class="form-group has-success has-feedback">

           <label class="col-sm-3 control-label"><font color="white">Nom du Formulaire:</font></label>
            <div class="col-sm-8">
                                                       
                                                
                         <textarea class="form-control rounded-0" style="color:#2060a6;background-color:white;font-weight:bold" required="required" name="nomformulaireutilise"  VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" placeholder="Saisir  le Nom du Formulaire a utiliser" rows="3"></textarea>
                                 

             </div> <br/> <br/> <BR><BR>

      
 <!--extraction le numero IDUSER de celui qui se connecter,qui enregistre dans la bdd-->
                  <input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">
          <input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>" />

                                         
                                                     <div class="col-sm-6">
                                                       
                            
                                                <CENTER><button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button></CENTER>
                                                 
                                                    </div><BR><BR><BR>

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->

<!--FIN DE LA FENETRE MODALE-->



<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->


<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-formulaireuse').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_formulaire_use').html("<span style='color: red; text-align: center;font-size: 18px'>Ce Formulaire existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#formulaire-utilise-select-card').html(response); 
                   
                    $('.message_afficher_formulaire_use').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Formulaire ajouté avec succès.Fermer la Fênetre.</span>");
                    
                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->






<!--CREATION DES FORMULAIRE POP POP MODAL-->


<!--fenetre modale pour enregitrer Enregistrement d'un Emetteur si donnee nexiste pas-->
    <div class="modal" id="fenetre_modale_document_delivre">
                          <div class="modal-dialog  modal-lg">
                            <div class="modal-content" style="background-color:#03224c;color:white"> <!--COULEUR DE FOND DE LA PAGE MODALE-->
                          <div class="modal-header" style="background-color:#03224c;color:white">
                                <h4 class="modal-title">Fiche d'enregistrement des documents a délivrer</h4>                  
                              </div>
                              <div class="modal-body"> 
                
                                <div class="message_afficher_document_delivre"></div>
                
                                   <form action="save_ajax_modale.php" class="save-document-delivrer" method="POST"> 
                
                                   
<div class="form-group has-success has-feedback">

           <label class="col-sm-3 control-label"><font color="white">Nom du Document:</font></label>
            <div class="col-sm-8">
                                                       
                                                
                         <textarea class="form-control rounded-0" style="color:#2060a6;background-color:white;font-weight:bold" required="required"  VALUE ="" onKeyUp="javascript:this.value=this.value.toUpperCase();" name="nomdocdelivre" placeholder="Saisir  le Nom du Document a delivrer" rows="3"></textarea>
                                 

             </div> <br/> <br/> <BR><BR>

      
 <!--extraction le numero IDUSER de celui qui se connecter,qui enregistre dans la bdd-->
                  <input type="hidden"  name="numat"  value="<?php echo $stat8['numat']; ?>">
          <input type="hidden" name="dateheuresaisi" value="<?php echo $date=date('d/m/Y' );?> à <?php echo  date("H:i:s");?>" />

                                         
                                                     <div class="col-sm-6">
                                                       
                            
                                                <CENTER><button style="background-color:green; color: white; height: 40px" type="submit" >
                                                  <span><i class="ace-icon glyphicon glyphicon-ok"></i></span>
                                                  Enregistrer
                                                </button></CENTER>
                                                 
                                                    </div><BR><BR><BR>

                                              



                                                   

             </div>
                   
                                </form>
                
                              </div>
                              
                <div class="modal-footer">
    
               <center><i style="color:red;font-weight:bold">Les champs marqués d'un astérisques(*) sont obligatoire </i></center>


    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
   </div>
                
                
                            </div>
                          </div>
    </div>
<!--FIN DE LA FENETRE MODALE-->

<!--FIN DE LA FENETRE MODALE-->


<!--CREATION DES SCRIPT POUR INSERER AVEC AJAX-->


<!-- gestion de la soumission des formulaires des fenetres modale par ajax-->
<script type="text/javascript">
    $(document).ready(function(){

      
        $('.save-document-delivrer').on('submit',function(e){
            e.preventDefault();

            let url = $(this).attr('action');
            let data = $(this).serialize();

            $.post(url,data,function(response){                    
               
               if (response == '0') {
                  
              $('.message_afficher_document_delivre').html("<span style='color: red; text-align: center;font-size: 18px'>Ce document existe déja.réessayer un autre...</span>");
                   //console.log(response);
               
         }else{

                    $('#document_delivre-select-card').html(response); 
                   
                    $('.message_afficher_document_delivre').html("<span style='background-color:green;color:white; text-align:center;font-size: 18px'>Document ajouté avec succès.Fermer la Fênetre.</span>");
                    
                    console.log(response);                 
               }

            
            }); 
           
        })

    })
</script>
<!--fin-->