<?php  
 $connect = mysqli_connect("127.0.0.1", "root", "eth@n@2018", "si_anac");
 $idstatuttache = $_POST["idstatuttache"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"]; 
 
 $sql = "UPDATE statut_tache SET ".$column_name."='".$text."' WHERE idstatuttache='".$idstatuttache."'";  
 if(mysqli_query($connect, $sql))  
 {  
     // echo 'Modification effectuée  avec succes';  
 }  
 ?>  