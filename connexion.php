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
				<form class="formu" method="post">
						<div class="titre">
						<legend>Connexion</legend>
					</div>
						<div class="input-container">
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="login" placeholder="login"required/>
                        <label for="password">Mot de Passe :</label>
						<input type="password" name="pass"  placeholder="mot de passe"required/>
						<div class="btn">
						<input type="submit" value="Connexion" name="Connexion"required/>
					</div>
				</div>
			</article>
						
					
				</form>
</section>
</main>

<?php

if(isset($_POST["Connexion"]))
{

	$login=$_POST["login"];
	$password=($_POST["pass"]);
	$password = sha1($password);
	$connexion = mysqli_connect("localhost", "root", "", "forum");
	$requete = "SELECT * FROM utilisateurs WHERE login='$login'";
	$query=mysqli_query($connexion,$requete);
	$resultat=mysqli_fetch_all($query);

	
  if(!empty($resultat))
  {

    if ($password == $resultat[0][2])
    {
    
      $_SESSION['id']=$resultat[0][0];
      $_SESSION['login']=$resultat[0][1];
    mysqli_close($connexion);
    header('Location: index.php');
    
    }

  }
}

?>

<footer>
				
				Copyright © 2020 All rights reserved
	</footer>	
</body>
</html>