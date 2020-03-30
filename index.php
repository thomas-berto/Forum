<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>index</title>
	</head>

<body>

  <header class="topnav">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
 </nav>
</header>
<main>	<section> 
	<?php	
$connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = "SELECT id_topics, auteur, titre, date FROM topics ORDER BY date DESC";
$req = mysqli_query($connexion,$sql);
$topics = mysqli_num_rows ($req);

if ($topics == 0) {
	echo 'Aucun topic';

}
else {
	?>
	<table width="500" border="1"><tr>
	<td>
	Topics
	</td><td>
	Auteur
	</td><td>
	Date dernière réponse
	</td></tr>
	<?php
	while ($data = mysqli_fetch_array($req)) {

	echo '<tr>';
	echo '<td>';
	echo '<a href="topic.php?id_topics=' , $data['id_topics'] , '">' ,$data['titre'] , '</a>';
	echo '</td><td>';
	echo $data['auteur'];
	echo '</td><td>';
	echo $data['date'];

	                                         }
		 }
		
	?>
	</td></tr></table>
	<?php
	
	if (isset($_SESSION['login'])) 
 {
$login = $_SESSION['login'];
$sql2 = "SELECT *  FROM utilisateurs WHERE login='$login'";
$req2= mysqli_query($connexion,$sql2);
$dataa =  mysqli_fetch_array($req2);
echo '<p><a href="nvxtopic.php?grade=' , $dataa['grade'] , '">Insérer un topic</a></p></section>';
 }
 else 
 echo '</section>'


?>

</main>
<footer>


	</footer>	
</body>
</html>


