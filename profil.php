<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>index</title>
    </head>
    <body>
         <header class="topnav">
            <nav>
                <ul>
                    <?php include('header.php') ?>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <?php
                if(isset($_GET['action']))
                {
                    $action = ($_GET['action'])?htmlspecialchars($_GET['action']):'consulter';
                    $id = $_GET['id'];
                    $connexion = mysqli_connect("localhost", "root", "", "forum");
                    $sql = "SELECT * FROM utilisateurs WHERE id = '$id'";
                    $query = mysqli_query($connexion, $sql);
                    $data = mysqli_fetch_array($query);

                    echo' <article class="press"><h2>Profil de '.$data['login'].'</h2>';
                    echo'<p><strong>Sexe</strong>: '.$data['sexe'].'</p>';
                    echo'<p><strong>description</strong>:' .$data['description'].'</p>';
                    if(isset ($_SESSION['login']))
                    {
                        echo'<p><strong>Adresse E-Mail : </strong>
                        <a href="mailto:'.$data['email'].'"> '.$data['email'].'</a><br />';
                    }
                        echo'<p><strong>Localisation : </strong>  '.$data['localisation'].'</a><br />';
                        echo'Ce membre est inscrit depuis le <strong>'.$data['date'].'</strong></article>;';
                }  
                    else
                    {
                        $id = $_GET['id'];
                        $connexion = mysqli_connect("localhost", "root", "", "forum");
                        $sql = "SELECT * FROM utilisateurs WHERE id = '$id'";
                        $query = mysqli_query($connexion, $sql);
                        $data = mysqli_fetch_array($query);
                        
                        if(!empty($_POST['modifier']))
                        {
                            $pass= $_POST["passe"];
                            $pass= sha1($pass);
                            $pass2= $_POST["passe2"];
                            $pass2= sha1($pass2);
                            $localisation = $_POST["localisation"];
                            $des = $_POST["des"];
                            
                            if(($_POST['passe']!=$_POST['passe2']))
                            {
                                echo"<p class='bug'>Mots de passes rentrés différents</p>";
                            }
                            else
                            {
                                $insert="UPDATE utilisateurs SET password = '$pass', localisation = '$localisation', description = '$des'
                                WHERE login = '".$_SESSION['login']."'";
                                $result= mysqli_query($connexion, $insert);
                                echo'<p class="bug">modifier avec succés</p>';
                            }
                        }
                        ?>
                        <article>
                            <h1>Modification profil</h1>
                        </article>
                        <article>
                            <form class="forme" action="" method="post">
                                <fieldset>
                                    <legend>Identifiants</legend>
                                    <label>Login :
                                        <input type="text" disabled  value="<?php echo $data['login'] ?>" name="login" maxlength="8"  required placeholder="login"/></label>
                                    <label>Mot de passe :
                                        <input type="password" name="passe" minlength="4"  placeholder=" new password"/></label>
                                    <label>Confirmation :
                                        <input type="password" minlength="4"  name="passe2"  placeholder="confirmation"/></label>
                                </fieldset>
                                <fieldset>
                                    <legend> Infos personelles</legend>
                                    <label>Email :
                                         <input type="email" name="email"  size="30" value="<?php echo $data['email'] ?>" pattern=".+@gmail.com" 
                                         placeholder="ex:toto@gmail.com"/></label>
                                    <label>Localisation :
                                        <input type="text" name="localisation" value="<?php echo $data['localisation'] ?>"  placeholder="localisation"/></label>
                                    <label>Description :
                                        <textarea name="des" value="<?php echo $data['description'] ?>"  placeholder="description"></textarea></label>
                                </fieldset>
                                    <label>
                                        <input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J accepte les conditions générales d utilisation.*</a>
                                    </label>
                                        <input type="submit" value="modif" name="modifier"/>
                                    </form>
                        </article>
                         <?php

                    } 
?>

            </section>
        </main>
        <footer>

<?php include('footer.php') ?>

	</footer>	
</body>
</html>
           