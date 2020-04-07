<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>connexion</title>
	</head>

<body class="connexion">



  <header class="menu">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
 </nav>
</header>
<main>
	
	<?php
		
		if(isset($_SESSION['login']))
			{
				header('Location: index.php');
			} 
			
			?>
		
		<section> 
			<article class="box">
				<form class="forme" method="post">
					<h1>Connexion</h1>
					<fieldset> <legend>Connecte Toi </legend>
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="login"  placeholder="login"required/>
                        <label for="password">Mot de Passe :</label>
						<input type="password" name="pass"  placeholder="mot de passe"required/>
					</fieldset>
						<input type="submit" value="Connexion" name="Connexion"required/>
					
				</form>

			 </article>
		</section>	


		<section>
<?php

if(isset($_POST["Connexion"]))
{

	$login=$_POST["login"];
	$password=($_POST["pass"]);
	$password = sha1($password);
	$connexion = mysqli_connect("localhost", "root", "", "forum");
	$requete = "SELECT * FROM utilisateurs WHERE login='$login'";
	$query=mysqli_query($connexion,$requete);
	$resultat = mysqli_fetch_array($query);

	    if ($login == $resultat["login"] && $password == $resultat["password"])
    {
    
	  $_SESSION["id"]=$resultat["id"];
	  $_SESSION['login']=$resultat["login"];

    mysqli_close($connexion);
     header('Location: index.php');  
    
	}
else{
    echo '<p class="bug">*Login ou Mot de passe incorrect</p>';	
	
}  

}

?>


        </section>
</main>
<footer>
				
<?php include('footer.php') ?>
	</footer>	
</body>
</html>