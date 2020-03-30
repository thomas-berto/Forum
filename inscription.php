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
}
?>
</ul>
 </nav>
		</header>
		
		<main>
			<div><form action="inscription.php" method="post">
			<fieldset>
				<legend>Identifiants</legend>
					<input type="text" name="login" maxlength="8"  placeholder="login"/>
					<input type="password" name="passe" minlength="4"  placeholder="password"/>
					<input type="password" minlength="4"  name="passe2"  placeholder="confirmation"/>
					<label><input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.</a></label>
					<input type="submit" value="inscription" name="inscription"/>
</fieldset>
				
				</form></div>

<section>

<?php
if(isset($_POST["inscription"]))
{
$login=$_POST['login'];
{$connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = "SELECT * FROM utilisateurs WHERE login='$login'";
$req = mysqli_query($connexion, $sql);
$req2 = mysqli_num_rows($req); 

	if(($_POST['passe']!=$_POST['passe2']))
		{			echo"<p>Mots de passes rentrés différents</p>";

		}
		else if($req2==1)
		{	  		echo "*Login existant";
		}
	 else{
	$login=$_POST["login"];
	$pass=$_POST["passe"];
	$pass= sha1($pass);
	$pass2=$_POST["passe2"];		
	$requete = "INSERT INTO utilisateurs(login, password) values ('$login','$pass')";
	$query = mysqli_query($connexion, $requete);
	mysqli_close($connexion);

	header('Location: connexion.php');
	 }
}
}
?>
			
</main>
<footer>
			
	</footer>	
</body>
</html>		