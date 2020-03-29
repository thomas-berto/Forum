
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
<section>
    <form method="post">
<?php
 if (isset($_SESSION['login'])) 
 {
$connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = 'SELECT auteur, titre, date FROM sujets WHERE id_topics="'.$_GET['id_topics'].'" ';
$sql2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
$req = mysqli_query($connexion, $sql2);
$req2 = mysqli_fetch_assoc($req);
?>


		<input disabled type="text" value=<?php echo $req2['login'];?>  name="auteur" >
		<input  required placeholder="Titre" type="text" name="titre" size="50">
		<textarea required placeholder="Votre message" name="message"></textarea>
		<input type="hidden" name="topic" value="<?php echo $_GET['id_topics'];?>">
		<input type="submit" name="go" value="Poster">
    </form>
    
<?php
if(isset($_POST["go"]))
{
	$auteur=$_POST["auteur"];
    $titre=$_POST["titre"];
    $message=$_POST["message"];
    $connexion = mysqli_connect("localhost", "root", "", "forum");
	$sql = "INSERT INTO `sujets` (auteur, titre, description, date, id_topics)
      VALUES ('".$auteur."', '".$titre."',  '".$message."',CURRENT_TIMESTAMP(),'".$_POST['topic']."')";
  $query = mysqli_query($connexion, $sql);
  header('Location: topic.php');

}} else {
	echo "<p> vous n'avais pas accé(e) a cette page </p>";
}		
?>
    </section>
</main>
<footer>


	</footer>	
</body>
</html>

