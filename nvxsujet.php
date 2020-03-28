
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
<?php
$connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = 'SELECT auteur, titre, date FROM sujets WHERE id_topics="'.$_GET['id_topics'].'" ';
$req = mysqli_query($connexion, $sql);
$req2 = mysqli_fetch_assoc($req);

?>

<form method="post">
		<input type="text" value=<?php echo $req2['auteur'];?>  name="auteur" >
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

}
?>
    </section>
</main>
<footer>


	</footer>	
</body>
</html>

