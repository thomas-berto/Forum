<?php
    $connexion = mysqli_connect("localhost", "root", "", "forum");
    $reponse = $_GET["id_reponse"]; 
     $requete="SELECT id_sujets from reponses WHERE id_reponse=".$reponse.";";
     $result=mysqli_query($connexion, $requete);
     $resultat=mysqli_fetch_array($result);
     $id=$resultat['id_sujets'];

    $delete="DELETE FROM `reponses` WHERE id_reponse='$reponse'";
	$quer= mysqli_query($connexion,$delete);
    echo "<p class='bug'>$reponse supprimée avec succès !</p>";

 header("Location:sujet.php?id_sujets=$id") ;


?>