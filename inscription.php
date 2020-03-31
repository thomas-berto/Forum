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
					<input type="text" name="login" maxlength="8"  required placeholder="login"/>
					<input type="password" name="passe" minlength="4" required placeholder="password"/>
					<input type="password" minlength="4"  name="passe2" required placeholder="confirmation"/>					
            </fieldset>
			<fieldset>
			    <legend> Infos personelles</legend>				
	                <input type="text" name="nom" placeholder='nom'>
				    <input type="text" name="prenom" placeholder='prenom'>
	 <P>Sexe : <label>Homme </label>
		            <input type="radio" name="sex" value="Homme" > 
	           <label>Femme </label>
		            <input type="radio" name="sex" value="Femme"> </p>
					<input type="email" name="email"  size="30"  placeholder="toto@exemple.com">
					<input type="text" name="localisation" placeholder='localisation'>


			</fieldset>


				<label><input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.</a></label>
					<input type="submit" value="inscription" name="inscription"/>
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
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$sexe = $_POST["sex"];
	$email = $_POST["email"];
	$localisation = $_POST["localisation"];
	$pass= sha1($pass);
	$pass2=$_POST["passe2"];		
	$requete = "INSERT INTO utilisateurs(login, password, nom, prenom, sexe, email, localisation)
	 values ('$login','$pass','$nom','$prenom','$sexe','$email','$localisation')";
	$query = mysqli_query($connexion, $requete);

	mysqli_close($connexion);

	 }
}
}echo $requete;
?>
			
</main>
<footer>
			
	</footer>	
</body>
</html>		