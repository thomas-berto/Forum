<!-- <?php
session_start();

if (isset($_SESSION['login'])) 
{
$login=$_SESSION['login'];
$reponse = $_GET["id_reponse"]; 
$aime = $_GET["like"]; 


$connexion = mysqli_connect("localhost", "root", "", "forum");
$like1  = "SELECT * FROM utilisateurs WHERE login='$login'";
 $like2 = mysqli_query($connexion,$like1);		
 $like = mysqli_fetch_array($like2);
$utilisateur = $like["id"];

 $select = "SELECT * FROM likes WHERE id_reponse = '$reponse' AND id_utilisateur = '$utilisateur' ";
 $select2 = mysqli_query($connexion,$select);
 $select3 = mysqli_fetch_array($select2);


 $requete="SELECT id_sujets from reponses WHERE id_reponse='$reponse'";
 $result=mysqli_query($connexion, $requete);
 $resultat=mysqli_fetch_array($result);
 $id=$resultat['id_sujets'];




 if($aime == 1  && !$select3 )
 {  $insert = "INSERT INTO likes (id_like, aime, id_reponse, id_utilisateur) VALUES (NULL, $aime, $reponse, $utilisateur)";
 $query = mysqli_query($connexion, $insert);
 }

  elseif ($select3["aime"] == 1 && $aime == 1)  { 

    $delete = "DELETE FROM likes WHERE  id_reponse = '$reponse' AND id_utilisateur = '$utilisateur' ";
  $resultat = mysqli_query($connexion, $delete); 
  mysqli_close($connexion);	
                                    }

elseif ($aime == 2 && !$select3 )
 {  $insert = "INSERT INTO likes (id_like, aime, id_reponse, id_utilisateur) VALUES (NULL, $aime, $reponse, $utilisateur)";
 $query = mysqli_query($connexion, $insert);
 }

 elseif ($select3["aime"] == 2 && $aime == 2)  { 

    $delete = "DELETE FROM likes WHERE  id_reponse = '$reponse' AND id_utilisateur = '$utilisateur' ";
  $resultat = mysqli_query($connexion, $delete); 
                                    }


elseif($aime == 2 && $select3["aime"] == 1 )
{  $delete = "DELETE FROM likes WHERE  id_reponse = '$reponse' AND id_utilisateur = '$utilisateur' "; 
    $resultat = mysqli_query($connexion, $delete); 
 $insert = "INSERT INTO likes (id_like, aime, id_reponse, id_utilisateur) VALUES (NULL, 2, $reponse, $utilisateur)";
$query = mysqli_query($connexion, $insert);   

}

elseif($aime == 1 && $select3["aime"] == 2 )
{  $delete = "DELETE FROM likes WHERE  id_reponse = '$reponse' AND id_utilisateur = '$utilisateur' "; 
    $resultat = mysqli_query($connexion, $delete); 
 $insert = "INSERT INTO likes (id_like, aime, id_reponse, id_utilisateur) VALUES (NULL, $aime , $reponse, $utilisateur)";
$query = mysqli_query($connexion, $insert);   

}






header("Location:sujet.php?id_sujets= $id & id_reponse=$reponse") ;
      

 


}





