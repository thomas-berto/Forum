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
			<section>
				<form class="forme" action="inscription.php" method="post">
					<h1>Inscription</h1>
					<h3>(Les champs indiqués par une * sont obligatoires)</h3>
					<fieldset>
						<legend>Identifiants</legend>
						<label>login* :
							<input type="text" name="login" maxlength="8"  required placeholder="login"/></label>
				        <label>mot de passe* :
					        <input type="password" name="passe" minlength="4" required placeholder="password"/></label>
				        <label>confirmation* :
						    <input type="password" minlength="4"  name="passe2" required placeholder="confirmation"/></label>				
                    </fieldset>
			        <fieldset>
			            <legend> Infos personelles</legend>				
	                    <label>nom* :
							<input required type="text" name="nom" placeholder='nom'/>
						</label> 
				        <label>prenom* : 
							<input required type="text" name="prenom" placeholder='prenom'/>
						</label> 
	                    <label>Sexe* : 
		                <label> Homme
							<input required type="radio" name="sex" value="Homme" />
						</label>
					    <label>Femme
							<input required type="radio" name="sex" value="Femme"/>
						</label></label>
		         	    <label>email(uniquement gmail) : 
				            <input type="email" name="email"  size="30" pattern=".+@gmail.com" 
					       , placeholder="ex:toto@gmail.com"/></label>
					    <label>localisation : 
							<input type="text" name="localisation" placeholder='ville'/>
						</label>
					    <label>description : 
							<textarea name="des" maxlength="200" placeholder='description'></textarea>
						</label>
							</fieldset>
							<label>
								<input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.</a></label>
								<input type="submit" value="inscription" name="inscription"/>
							</form>
						</section>
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
		{			echo"<p class='bug'>Mots de passes rentrés différents</p>";

		}
		else if($req2==1)
		{	  		echo "<p class='bug'>*Login existant</p>";
		}
	 else{
	$login=$_POST["login"];
	$pass=$_POST["passe"];
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$sexe = $_POST["sex"];
	$email = $_POST["email"];
	$localisation = $_POST["localisation"];
	$des = $_POST["des"];
	$pass= sha1($pass);
	$pass2=$_POST["passe2"];		
	$requete = "INSERT INTO utilisateurs(login, password, nom, prenom, sexe, email, localisation, description, date)
	 values ('$login','$pass','$nom','$prenom','$sexe','$email','$localisation', '$des', CURRENT_TIMESTAMP())";
	$query = mysqli_query($connexion, $requete);

	mysqli_close($connexion);
	header('Location: connexion.php');
	 }

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