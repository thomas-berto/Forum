<?php
$connexion = mysqli_connect("localhost", "root", "", "forum");
$totalmenbre ='SELECT COUNT(*) FROM utilisateurs';
$req='SELECT login,id FROM utilisateurs ORDER BY id DESC';
$query2 = mysqli_query($connexion,$req);
$dataa =mysqli_fetch_array($query2);
$derniermembre = stripslashes(htmlspecialchars($dataa[0]));
$query = mysqli_query($connexion,$totalmenbre);
$data = mysqli_fetch_array($query);
    echo'<p>Le forum comptent <strong>'.$data[0].'</strong> membres.';
    echo'Le dernier membre inscrit est <a href="profil.php?id='.$dataa[1].'&amp;action=consulter">'.$derniermembre.'</a>.</p>';
    

?>

