<?php
require 'db_connection_utilisateur.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $userid = $_GET['id'];
    $delete_user = mysqli_query($conn,"DELETE FROM `materiel` WHERE ID_Materiel='$userid'");
    
    if($delete_user){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'entrée_matériel.php';
        </script>";
        exit;
    }else{
       echo "Opps something wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>