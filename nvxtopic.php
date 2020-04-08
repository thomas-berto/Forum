<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>nvxtopics</title>
	</head>
	<body>
		<header>
    <nav>
<ul>
<?php include('header.php');
		if(!isset($_GET['grade']))
		{header('Location: index.php');}
		 ?>
</ul>
   </nav>
        </header>

        <main>
		<?php
 if ($_GET['grade']==3)
 {
	 echo "<p>vous n'avez pas accéé a cette page</p>";
 }
 else{
 if (isset($_SESSION['login'])) 
      {
        $login= $_SESSION['login'];
        $connexion = mysqli_connect("localhost", "root", "", "forum");
        $sql2 = "SELECT * FROM utilisateurs WHERE login = '$login'";  
		$req = mysqli_query($connexion, $sql2);

		$req2 = mysqli_fetch_assoc($req);

	?>

<section>
	<form  class="forme"method="post">
		<h1>Nouveau topic</h1>
		<fieldset>
			 <legend>TOPIC</legend>
			 <input type="text" disabled name="auteur" placeholder="auteur"  value= <?php echo $login;?> />
			 <input  required type="text" name="titre" size="50" placeholder="titre"/>
			   <input type="submit" name="go" value="Poster"/>
	    </fieldset>
      
	</form>
<?php
 
	if(isset($_POST["go"]))
{
	$auteur=$login;
	$titre=$_POST["titre"];
	$requete = "INSERT INTO `topics` (`id_topics`,`auteur`, `titre`, `date`) 
 VALUES (NULL,'".$auteur."', '".$titre."', CURRENT_TIMESTAMP())";  
  $query = mysqli_query($connexion, $requete);


 }	}}
 ?>
         </section>


        </main>
<footer>


<?php include('footer.php') ?>

</footer>	
</body>
</html>
        
        
        
