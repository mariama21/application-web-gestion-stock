<?php
require 'db_connection_utilisateur.php';


    // check username and email empty or not
    if(!empty($_POST['Nom_Entreprise']) && !empty($_POST['Pays']) && !empty($_POST['Contact']))
    {
        // Escape special characters.
        $Nom_Entreprise = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Nom_Entreprise']));
        $Pays= mysqli_real_escape_string($conn, $_POST['Pays']);
        $Contact = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Contact']));
        
        
            
               // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `fournisseur`(Nom_Entreprise,Pays,Contact)
                 VALUES('$Nom_Entreprise','$Pays','$Contact')");


                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
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