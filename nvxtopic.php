<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>index</title>
	</head>
	<body>
		<header>
    <nav>
<ul>
<?php include('header.php') ?>
</ul>
   </nav>
        </header>

        <main>
<section >
	<form method="post">
	

        <input type="text" disabled name="auteur" placeholder="auteur"  value="" >
		<input  required type="text" name="titre" size="50" placeholder="titre">
		<input type="submit" name="go" value="Poster">
	</form>
<?php

	if(isset($_POST["go"]))
{

	$auteur=$_POST["auteur"];
	$titre=$_POST["titre"];
    $connexion = mysqli_connect("localhost", "root", "", "forum");
	$requete = "INSERT INTO topics (`id`,`auteur`, `titre`, `date`) 
 VALUES (NULL,'$auteur', '$titre',CURRENT_TIMESTAMP())";  
  $query = mysqli_query($connexion, $requete);

  header('Location: index.php');
}

	
?>
</section>

        </main>
<footer>



</footer>	
</body>
</html>
        
        
        
