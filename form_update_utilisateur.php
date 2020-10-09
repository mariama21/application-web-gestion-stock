<?php
require 'db_connection_utilisateur.php';
// UPDATING DATA


    
    // check username and email empty or not
    if(!empty($_POST['Nom_Utilisateur']) && !empty($_POST['Prenom']) && !empty($_POST['Login'])  && !empty($_POST['Statut']) && !empty($_POST['Type']) && !empty($_POST['user_id']) && !empty($_POST['mot_de_passe']))
    {
        
        // Escape special characters.
        $Nom_utilisateur = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Nom_Utilisateur']));
        $Prenom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Prenom']));
        $Login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Login']));
        //$Statut = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Statut']));
        $Statut = "Actif";
        $Type = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Type']));
        $user_id= mysqli_real_escape_string($conn, htmlspecialchars($_POST['user_id']));
        $mot_de_passe= mysqli_real_escape_string($conn, htmlspecialchars($_POST['mot_de_passe']));
        
             // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE `utilisateur` SET Nom_Utilisateur='$Nom_utilisateur',Prenom='$Prenom',Login='$Login', mot_de_passe='$mot_de_passe',Statut='$Statut',Type='$Type' WHERE ID_Utilisateur='$user_id'");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'utilisateurs.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
            
        
    }else{
        echo "<h4>Please fill all fields</h4>";
      
}
?>