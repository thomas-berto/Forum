<?php
session_start();

 if (isset($_SESSION['login'])):
    $login=$_SESSION['login'];
    $connexion = mysqli_connect("localhost", "root", "", "forum");
    $requete="SELECT grade from utilisateurs WHERE login='$login'";
    $query=mysqli_query($connexion, $requete);
    $array=mysqli_fetch_array($query);

    
	?>


<li><a href="index.php">Acceuil</a></li>
 
    <?php echo'  
        <li><a href="profil.php?id=' , $_SESSION['id'] , '">Profil</a></li>';
        if($array['grade']==1 or $array['grade']==2)
        {
            echo'<li><a href="admin.php">Admin</a></li>';
        }
    ?>   
<li>
        <form action="index.php" class='head' method="post">
            <input type="submit" name='deconnexion' class="deco" value="deconnexion">
        </form>

    

<?php if (isset($_POST['deconnexion'])) {
                session_unset();
                session_destroy();
                header('Location:index.php');
            }
            ?></li>


 <?php else:?>     
 
    <li><a href="index.php">Acceuil</a></li>
 <li><a href="inscription.php">Inscription</a></li>
 <li><a href="connexion.php">Connexion</a></li>


 
<?php endif;?>             






