<?php
require 'db_connection_utilisateur.php';
// UPDATING DATA


    
    // check username and email empty or not
    if(!empty($_POST['Nom_Entreprise']) && !empty($_POST['Pays']) && !empty($_POST['Contact']))
    {
        
        // Escape special characters.
        $Nom_Entreprise = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Nom_Entreprise']));
        $Pays = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Pays']));
        $Contact = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Contact']));
        $userid= mysqli_real_escape_string($conn, htmlspecialchars($_POST['userid']));
        
            
        

                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE `fournisseur` SET Nom_Entreprise='$Nom_Entreprise',Pays='$Pays',Contact='$Contact' WHERE ID_Fournisseur=$userid");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'index_fournisseur.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
            
        
    }else{
        echo "<h4>Please fill all fields</h4>";
      
}
?>