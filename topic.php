<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>index</title>
	</head>
	<body>
		<header class="topnav">
			<nav>
				 <ul> <?php include('header.php') ?></ul>
			</nav>
		</header>
		<main>
			<?php
			if(empty($_GET['id_topics']))
			{
				echo'<section><p><a href="index.php"> Veuillez choisir un topic.</a> </p></section>';
			}
			else 
			{
				$connexion = mysqli_connect("localhost", "root", "", "forum");
				$sql1 = "SELECT topics.id_topics, topics.auteur, topics.titre, topics.date, utilisateurs.id FROM topics
				INNER JOIN utilisateurs where  topics.auteur = utilisateurs.login
				AND id_topics='".$_GET['id_topics']."'  ORDER BY date DESC"; 
				$req1 = mysqli_query($connexion,$sql1);		
				$dataa = mysqli_fetch_array($req1);
				?>
				  <section>
					    <article>
							 <h1> <?php echo $dataa['titre']; ?> </h1> 
							 <h3><?php echo' <a href="profil.php?id='.$dataa['id'].'&amp;action=consulter">(', $dataa["auteur"],')</a>'; ?></h3> 
		              	</article>
		  				<article>
							  <table>
								   <thead>
										<td> Sujet</td>
										<td>Auteur</td>
										<td> description</td>
										<td>Date de creation </td>
									</thead>
									<?php
									$connexion = mysqli_connect("localhost", "root", "", "forum");
									$sql = 'SELECT sujets.id_sujets, sujets.auteur, sujets.titre, sujets.description, sujets.date, sujets.id_topics, utilisateurs.id
									FROM sujets INNER JOIN utilisateurs where  sujets.auteur = utilisateurs.login
									AND id_topics="'.$_GET['id_topics'].'" ORDER BY date DESC';
									$req = mysqli_query($connexion,$sql);
									while ($data = mysqli_fetch_array($req))
									{
										echo '<tr>';
										echo '<td>';
										echo '<a href="sujet.php?id_sujets=' , $data['id_sujets'] , '">' ,$data['titre'] , '</a>';
										echo '</td><td>';
										echo ' <a href="profil.php?id='.$data['id'].'&amp;action=consulter">', $data["auteur"],'</a>';
										echo '</td><td>';
										echo $data['description'];
										echo '</td><td>';
										echo $data['date'];
									}
									?> 
									</td></tr>
								</table>
								<?php
								 echo '<p><a href="nvxsujet.php?id_topics=' , $_GET['id_topics'] , '"> Creer sujet</a></p>  ' ;
			}
			?>
			</article>
			</section>
		</main>
		<footer>
		<?php include('footer.php') ?>

		</footer>	
	</body>
</html>



