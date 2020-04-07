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
				  <article class="pres">
				  	
                     <h2>Qu'est-ce qu'un forum ? </h2> 
<p> La définition d'un forum sur internet est simple : un forum de discussion est un espace en ligne dédié à l'échange d'informations et messages entre membres d'une communauté. 
	Soit un site web dédié aux discussions et échanges entre internautes. </p>  

<p>	Le forum peut laisser place à des discussions et échanges généralistes ou concerner un thème précis.
	Ainsi, il existe sur internet des forums traitant de tous les sujets possibles et imaginables : forum sur le sport, l'actualités, les divertissements, l'informatique, ... 
	Généralement, chaque forum est dédié à un thème précis. </p>  
                    </article> 
                    <article>


	<?php	
$connexion = mysqli_connect("localhost", "root", "", "forum");
$sql = "SELECT topics.id_topics, topics.auteur, topics.titre, topics.date, utilisateurs.id FROM topics
INNER JOIN utilisateurs where topics.auteur = utilisateurs.login ORDER BY date DESC";
$req = mysqli_query($connexion,$sql);
$topics = mysqli_num_rows ($req);

if ($topics == 0)
 {
	echo 'Aucun topic';

  }
else {
	?>

	                  <table>
                         <thead>
			                 <td> Topic</td>
			                 <td>Auteur</td>
			                <td>Date création</td>
			            </thead>
	<?php
	while ($data = mysqli_fetch_array($req)) {

	echo '<tbody>';
	echo '<td>';
	echo '<a href="topic.php?id_topics=' , $data['id_topics'] , '">' ,$data['titre'] , '</a>';
	echo '</td><td>';
	echo' <a href="profil.php?id='.$data['id'].'&amp;action=consulter">', $data["auteur"],'</a>';
	echo '</td><td>';
	echo $data['date'];

	                                         }
		 }
		
	?>
	                         </td></tbody>
        </table>
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


?>                       </article>
              </section>
      </main>
        <footer>
<?php include('footer.php') ?>


	    </footer>	
</body>
</html>


