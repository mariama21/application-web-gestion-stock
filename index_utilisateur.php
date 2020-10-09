<?php
require 'db_connection_utilisateur.php';
// function for getting data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn,"SELECT * FROM `utilisateur`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>Nom</th>
                <th>Prenom</th> 
                <th>Login</th>
                <th>Statut</th>
                <th>Type</th>
                <th>Action</th> 
              </tr>';
        while($row = mysqli_fetch_assoc($get_data)){
           
            echo '<tr>
            <td>'.$row['Nom_Utilisateur'].'</td>
            <td>'.$row['Prenom'].'</td>
            <td>'.$row['Login'].'</td>
            <td>'.$row['Statut'].'</td>
            <td>'.$row['Type'].'</td>
            <td>
            <a href="update_utilisateur.php?id='.$row['ID_Utilisateur'].'">Edit</a> |
            <a href="delete_utilisateur.php?id='.$row['ID_Utilisateur'].'">Delete</a>
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
            <form action="insert_utilisateur.php" method="POST">
                <strong>Nom_utilisateur</strong><br>
                <input type="text" name="Nom_utilisateur" placeholder="Enter your full name" required><br>
                <strong>Prenom</strong><br>
                <input type="text" name="Prenom" placeholder="Entrer votre prènom" required><br>
                <strong>Login</strong><br>
                <input type="text" name="Login" placeholder="Entrer votre login" required><br>
                <strong>mot de passe</strong><br>
                <input type="password" name="mot_de_passe" placeholder="Entrer votre password" required><br>
                <strong>Statut</strong><br>
                <input type="text" name="Statut" placeholder="Entrer votre statut" required><br>
                <strong>Profil</strong><br>
                <select name="Type">
                     <option value="Administrateur">Choisissez un profil</option>
                     <option value="Administrateur">Administrateur</option>
                     <option value="Utilisateur">Utilisateur</option>
                </select>
                <br>
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