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
			<?php
			if(isset($_POST['submit']))
			{
				if (isset($_SESSION['login']))
				{
					$auteur = $_SESSION['login'];
				}
				else
				{
				$auteur = $_POST['auteur'];
			    }
			
						$message = $_POST['message'];
						$sujets= $_POST['sujets'];
						$connexion = mysqli_connect("localhost", "root", "", "forum");
						$sql = "INSERT INTO `reponses` (auteur, message, date, id_sujets)
						VALUES ('$auteur', '$message',CURRENT_TIMESTAMP(),'$sujets')";
						$query = mysqli_query($connexion, $sql);
						header("Location:sujet.php?id_sujets= $sujets  ");
			}
						?>
						<main>
						
						<?php
				$connexion = mysqli_connect("localhost", "root", "", "forum");
				$sql1 = 'SELECT titre,  description FROM sujets WHERE id_sujets="'.$_GET['id_sujets'].'" ';
				$req1 = mysqli_query($connexion,$sql1);		 
				$dataa = mysqli_fetch_array($req1);
				$sql = 'SELECT * FROM reponses  WHERE id_sujets="'.$_GET['id_sujets'].'" ORDER BY date DESC';
				$req = mysqli_query($connexion,$sql);
				
				if(empty($_GET['id_sujets']))
				{
					echo'<section><p><a href="index.php"> Veuillez choisir un sujet.</a> </p></section>';
				}
				else
				{
					?>
					<section>
						<article>
							<h1><?php echo $dataa['titre']; ?></h1>
							<h3>(<?php echo $dataa['description']; ?>)</h3>
						</article>
						<?php	
						while ($data = mysqli_fetch_array($req))
						{
							$idr = $data['id_reponse'];
							$o = 'SELECT * FROM like  WHERE id_reponse="'.$idr.'" ORDER BY date DESC';
							$k = mysqli_query($connexion,$o);
					
							$s = 'SELECT COUNT(aime) as id_reponse FROM likes WHERE aime="1" AND id_reponse = "'.$idr.'"';
							$q = mysqli_query($connexion,$s);
							$l = mysqli_fetch_row($q);
							$aime = $l[0];
							
							$a = 'SELECT COUNT(aime) as id_reponse FROM likes WHERE aime="2" AND id_reponse = "'.$idr.'"';
							$b = mysqli_query($connexion,$a);
							$c = mysqli_fetch_row($b);
							$aimepas = $c[0];
							if ($data['id_reponse'] % 2 != 0)
							{
								?>
								<article class="container">

								<p class="id"><?php echo $data['auteur'];?></p>
									<p class="texte"><?php echo $data['message'];?></p>
									<?php
								if (isset($_SESSION['login']))
								{
									?>
									<a href="like.php?id_reponse=<?php echo $idr; ?> & like=1">
									<img src="https://ih1.redbubble.net/image.435629281.8307/flat,128x128,075,t-pad,128x128,f8f8f8.jpg"
									width="15px"/>
									<?php echo $aime; ?></a>
									<a href="like.php?id_reponse=<?php echo $idr; ?> & like=2">
									<img src="https://s3.amazonaws.com/pix.iemoji.com/images/emoji/apple/ios-12/256/face-vomiting.png"
									width="15px"/>
									<?php echo $aimepas; ?></a></p>
									<?php
								}
								 ?>
										
									<span class="time"><?php echo $data['date'];?></span> 

								</article>
								<?php
							}
							else
							{
								?>
								<article class='containe'>
									<p class='ido'><?php echo $data['auteur'];?></p>
									<p class='text'><?php echo $data['message'];?></p>
									<?php
									if (isset($_SESSION['login']))
									{
										?>
										 <p><a href="like.php?id_reponse=<?php echo $idr; ?> & like=1">
										 <img src="https://ih1.redbubble.net/image.435629281.8307/flat,128x128,075,t-pad,128x128,f8f8f8.jpg"
										 width="15px"/>
										 <?php echo $aime; ?></a>
										 <a href="like.php?id_reponse=<?php echo $idr; ?> & like=2">
										 <img src="https://s3.amazonaws.com/pix.iemoji.com/images/emoji/apple/ios-12/256/face-vomiting.png"
										width="15px"/>
										<?php echo $aimepas; ?></a></p>
								
								
										<?php
			                        }				
										?>	
										<span class='tim'><?php echo $data['date'];?></span>
										</article>
								        <?php
	                        }
	
					    }
				}
				?>
				</section>
				<section>
					<div class="titre">
						<form  method="post">
							<legend class='rep'>Poster un message</legend>

						<?php 
						if (isset($_SESSION['login']))
						{
						}
						else
						{echo'<input type="text"   name="auteur">';
						}
						?>
							


					<textarea name="message"  maxlength="300" placeholder="Poster un message"></textarea>
					<input type="hidden" name="sujets" value="<?php echo $_GET['id_sujets'];?>">
					<input type="submit" name="submit" value="poster">
					
					
				
				</form></div>  
				  
                
  	</section>         



</main>

<footer>
<?php include('footer.php') ?>
	
				
	</footer>	
			</body>	
</html>
