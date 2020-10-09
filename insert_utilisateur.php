<?php
require 'db_connection_utilisateur.php';


    // check username and email empty or not
    if(!empty($_POST['Nom_utilisateur']) && !empty($_POST['Prenom']) && !empty($_POST['Login']) && !empty($_POST['mot_de_passe']) && !empty($_POST['Statut']) && !empty($_POST['Type']))
    {    
        // Escape special characters.
        $Nom_utilisateur = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Nom_utilisateur']));
        $Prenom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Prenom']));
        $Login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Login']));
        $mot_de_passe = mysqli_real_escape_string($conn, htmlspecialchars($_POST['mot_de_passe']));
        //$Statut = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Statut']));
        $Statut = "Actif";
        $Type = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Type']));
        //CHECK EMAIL IS VALID OR NOT
        
            
           
                
                // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `utilisateur`(Nom_utilisateur,Prenom,Login,mot_de_passe,Statut,Type)
                 VALUES('$Nom_utilisateur','$Prenom','$Login','$mot_de_passe','$Statut','$Type')");


                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = '../Gestion_stock/index_utilisateur.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
        
        
    }else{
        echo "<h4>Please fill all fields</h4>";    
    }

?>