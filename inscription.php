<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Inscription</title>
	</head>
	<body>
		<header>
		<nav>
<ul>
<?php include('header.php');
if(isset($_SESSION['login']) || isset($_SESSION['pass']))
{
	header('Location: index.php');
} ?>
</ul>
 </nav>
		</header>
		
		<main>
			<div >
				<form action="inscription.php" method="post">
					<input type="text" name="login"  placeholder="login"/>
					<input type="password" name="passe"  placeholder="password"/>
					<input type="password" name="passe2"  placeholder="confirmation"/>
					<label><input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.</a></label>
					<input type="submit" value="inscription" name="inscription"/>
				
				</form>
			</div>
</main>
<footer>
			
	</footer>	
</body>
</html>


<?php
if(isset($_POST["inscription"]))
{

	
	$login=$_POST["login"];
	$pass=$_POST["passe"];
	$pass= sha1($pass);
	$pass2=$_POST["passe2"];		
	$connexion = mysqli_connect("localhost", "root", "", "forum");
	$requete = "INSERT INTO utilisateurs(login, password) values ('$login','$pass')";
	$query = mysqli_query($connexion, $requete);
	mysqli_close($connexion);

	header('Location: connexion.php');
	
}
?>
		