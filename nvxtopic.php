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

	<?php
            if (isset($_SESSION['login'])) 
            {
             $connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
$req = mysqli_query($connexion, $sql);
$req2 = mysqli_fetch_assoc($req);
                ?>
        <input type="text" disabled name="auteur" placeholder="auteur"  value="<?php echo $req2['login']; ?>" >
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

}else {
	echo "<p> vous n'avais pas accé(e) a cette page </p>";
}		
?>
</section>

        </main>
<footer>



</footer>	
</body>
</html>
        
        
        
