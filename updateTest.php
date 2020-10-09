<?php
require 'db_connection_utilisateur.php';
// UPDATING DATA


    
    // check username and email empty or not
    if(!empty($_POST['Nom_utilisateur']) && !empty($_POST['Prenom']) && !empty($_POST['Login'])  && !empty($_POST['Statut']) && !empty($_POST['Type']))
    {
        
        // Escape special characters.
        $Nom_utilisateur = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Nom_utilisateur']));
        $Prenom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Prenom']));
        $Login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Login']));
        //$Statut = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Statut']));
        $Statut = "Actif";
        $Type = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Type']));
        $user_id= mysqli_real_escape_string($conn, htmlspecialchars($_POST['userid']));
        
            
        

                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE `utilisateur` SET Nom_Utilisateur='$Nom_utilisateur',Prenom='$Prenom',Login='$Login',Statut='$Statut',Type='$Type' WHERE ID_Utilisateur=$user_id");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'index_utilisateur.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
            
        
    }else{
        echo "<h4>Please fill all fields</h4>";
      
}
?>