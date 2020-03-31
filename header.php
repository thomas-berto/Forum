<?php
session_start();
if (isset($_SESSION['login'])):
	?>


<li><a href="index.php">Acceuil</a></li>
 <li><a href="topic.php">topic</a></li>
 
 <?php echo'  
 <li><a href="profil.php?id=' , $_SESSION['id'] , '">profil</a></li>'
?>   
<li>
        <form action="index.php" method="post">
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
 <li><a href="topic.php">topic</a></li>


 
<?php endif;?>             