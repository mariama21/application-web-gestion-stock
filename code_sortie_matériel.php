<?php
            require 'db_connection_utilisateur.php';
    // check username and email empty or not
    if( !empty($_POST['Date_Sortie']) && !empty($_POST['Demandeur']) && !empty ($_POST['Quantite_Sortie']) && !empty($_POST['sortid']))
    {    
         // Escape special characters.
        $Date_Sortie = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Date_Sortie']));
        $Demandeur= mysqli_real_escape_string($conn, htmlspecialchars($_POST['Demandeur']));
        $Quantite_Sortie = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Quantite_Sortie']));
        
        //$idUtilisateur = 4;
        $idUtilisateur = mysqli_real_escape_string($conn, htmlspecialchars($_POST['idUtilisateur']));
        $sortid = mysqli_real_escape_string($conn, htmlspecialchars($_POST['sortid']));
             
           
                
                // UPDATE USER DATA
                $update_query = mysqli_query($conn,"UPDATE `sortie_stock` SET Date_Sortie='$Date_Sortie',Demandeur='$Demandeur',Quantite_Sortie='$Quantite_Sortie' WHERE ID_Sortie_Stock='$sortid'"); 


                //CHECK DATA INSERTED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'sortie_matériel.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
        
        
    }else{
        echo "<h4>Please fill all fields</h4>";    
    
    }

?>