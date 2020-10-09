<?php
            require 'db_connection_utilisateur.php';
    // check username and email empty or not
    if(!empty($_POST['Nom_Materiel']) && !empty($_POST['Date_entree']) && !empty($_POST['Quantite_livree']) && !empty($_POST['Reference']) && !empty($_POST['idFournisseur']) && !empty($_POST['idUtilisateur']) && !empty($_POST['idMateriel']))
    {    
         // Escape special characters.
        $Nom_Materiel = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Nom_Materiel']));
        $Date_entree = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Date_entree']));
        $Quantite_livree = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Quantite_livree']));
        $Reference = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Reference']));
        $idFournisseur= mysqli_real_escape_string($conn, htmlspecialchars($_POST['idFournisseur']));
        //$idUtilisateur = 4;
        $idUtilisateur = mysqli_real_escape_string($conn, htmlspecialchars($_POST['idUtilisateur']));
        $idMateriel = mysqli_real_escape_string($conn, htmlspecialchars($_POST['idMateriel']));
             
           
                
                // UPDATE USER DATA
                $update_query = mysqli_query($conn,"UPDATE `materiel` SET Nom_Materiel='$Nom_Materiel',Date_entree='$Date_entree',Quantite_livree='$Quantite_livree',Reference='$Reference' WHERE ID_Materiel='$idMateriel'"); 


                //CHECK DATA INSERTED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'entrée_matériel.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
        
        
    }else{
        echo "<h4>Please fill all fields</h4>";    
    
    }

?>