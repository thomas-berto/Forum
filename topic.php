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
<main>

<?php
$connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = "SELECT * FROM sujets ORDER BY date DESC";
$req = mysqli_query($connexion,$sql);
$sujets = mysqli_num_rows ($req);

if(empty($_GET['id_topics']))
{
    echo'<section><p><a href="index.php"> Veuillez choisir un topic.</a> </p></section>';
}
else {
	?>
	<table width="500" border="1"><tr>
	<td>
	Topics
	</td><td>
	Auteur
	</td><td>
    description
	</td><td>
	Date dernière réponse
	</td></tr>
	<?php
	while ($data = mysqli_fetch_array($req)) {

	echo '<tr>';
	echo '<td>';
	echo '<a href="topic.php?id_sujets=' , $data['id_topics'] , '">' ,$data['titre'] , '</a>';
	echo '</td><td>';
	echo $data['auteur'];
    echo '</td><td>';
	echo $data['description'];
	echo '</td><td>';
    echo $data['date'];
    }
	     
    	?>
     </td></tr></table>

 
	<?php
  echo '<p><a href="nvxsujet.php?id_topics=' , $data['id_topics'] , '"> Répondre</a>  ' ;                 
               

}

	
?>
</section>
</main>
<footer>


	</footer>	
</body>
</html>



