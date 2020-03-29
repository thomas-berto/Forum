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
$sql = 'SELECT * FROM reponses  WHERE id_sujets="'.$_GET['id_sujets'].'" ORDER BY date DESC';
$sql1 = 'SELECT titre FROM sujets WHERE id_sujets="'.$_GET['id_sujets'].'" ';
$req1 = mysqli_query($connexion,$sql1);		 
$dataa = mysqli_fetch_array($req1);
$req = mysqli_query($connexion,$sql);



if(empty($_GET['id_sujets']))
{
    echo'<section><p><a href="index.php"> Veuillez choisir un sujet.</a> </p></section>';
}
else {
	?>



	<section><h1><?php echo $dataa['titre']; ?></h1></section>


<?php	
while ($data = mysqli_fetch_array($req)) {		
		if ($data['id'] % 2 != 0)
		{
			
		?>
	

		<div class="container">
		 				
      <p class="id"><?php echo $data['auteur'];?></p>
         <p class="texte"><?php echo $data['message'];?>	</p>	
         <span class="time"><?php echo $data['date'];?></span>
			</div>
		
		<?php
		}
	else{
?>
		<div class='containe'>
		 				
		<p class='ido'><?php echo $data['auteur'];?></p>
		   <p class='text'><?php echo $data['message'];?>	</p>	
		   <span class='tim'><?php echo $data['date'];?></span>
								 </div>
								 <?php
		  }
	
					}
                                        }				
											?>
											</article>
               <article> <div class="titre">
                  <form  method="post" >
			
				<legend class='rep'>Poster un message</legend>
                    <input type="text"   name="auteur" >
					<textarea name="message"  placeholder="Poster un message"></textarea>
					<input type="hidden" name="sujets" value="<?php echo $_GET['id_sujets'];?>">
					<input type="submit" name="submit" value="poster">
				</form></div>  
				<article>  
                
  	</section>         


<?php

if(isset($_POST['submit']))
{   $auteur= $_POST['auteur'];
	$message = $_POST['message'];
	$sujets= $_POST['sujets'];
     $connexion = mysqli_connect("localhost", "root", "", "forum");
	 $sql = "INSERT INTO `reponses` (auteur, message, date, id_sujets)
	  VALUES ('$auteur', '$message',CURRENT_TIMESTAMP(),'$sujets')";
	  echo $sql;

$query = mysqli_query($connexion, $sql);
  
}
?>
</main>

<footer>
				
				
	</footer>	
			</body>	
</html>