<?php
require 'db_connection_utilisateur.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM `fournisseur`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Nom_Entreprise</th>
                <th>Pays</th> 
                <th>Contact</th>
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['Nom_Entreprise'].'</td>
            <td>'.$row['Pays'].'</td>
            <td>'.$row['Contact'].'</td>
            <td>
            <a href="update_fournisseur.php?id='.$row['ID_Fournisseur'].'">Edit</a> |
            <a href="delete_fournisseur.php?id='.$row['ID_Fournisseur'].'">Delete</a>
            </td>
            </tr>';

        }
        echo '</table>';
    }else{
        echo "<h3>No records found. Please insert some records</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert_fournisseur.php" method="POST">
                <strong>Nom_Entreprise</strong><br>
                <input type="text" name="Nom_Entreprise" placeholder="Saisissez nom entreprise" required><br>
                <strong>Pays</strong><br>
                <input type="text" name="Pays" placeholder="Saisissez le pays correspondant" required><br>
                <strong>Contact</strong><br>
                <input type="text" name="Contact" placeholder="Entrez votre contact" required><br>
              <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <h2>Show Data</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>
</body>

</html>