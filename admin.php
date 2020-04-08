<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>admin</title>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<?php
                     include('header.php');
                    

                
                        ?>
				</ul>
			 </nav>
        </header>
                <main>
                <?php 
                if(isset($_SESSION['login']))
                    {
                         $login=$_SESSION['login'];
                         $connexion = mysqli_connect("localhost", "root", "", "forum");
                         $requete="SELECT grade from utilisateurs WHERE login='$login'";
                         $query=mysqli_query($connexion, $requete);
                         $array=mysqli_fetch_array($query);
                        
                         if($array['grade']==1)
                        {


?>


                    <section>
                        <div>
                            <form class="forme" method="post" action="">
                                <fieldset>
                                    <legend>supprimer un topic</legend>                 
                                    <input type="text" name="topic"/>
                                    <input type="submit" name="sup" value="nom topic"/>
                            </form>
                    <?php
                    if(isset($_POST['sup']))
                    {
						$base = mysqli_connect("localhost", "root", "", "forum");
						$topic=$_POST['topic'];
						$delete="DELETE FROM `topics` WHERE titre='$topic'";
						$quer= mysqli_query($base,$delete);
						echo "<p class='bug'>$topic supprimée avec succès !</p>";
					}
                        ?>
					    </div>

					    <div>
						    <form class="forme" method="post" action="">
                                <fieldset>
                                    <legend>supprimer un sujet</legend>
                                    <input type="text" name="sujet"/>
                                    <input type="submit" name="supp" value="nom sujet"/>
                                </fieldset>

                            </form>
                    <?php
                    if(isset($_POST['supp']))
                    {
						$base = mysqli_connect("localhost", "root", "", "forum");
						$sujet=$_POST['sujet'];
						$delet="DELETE FROM `Sujets` WHERE titre='$sujet'";
						$quer= mysqli_query($base,$delet);
                        echo "<p class='bug'>$sujet supprimée avec succès !</p>";

                    }
                }else
            { echo "<a href='index.php'<p>Vous n'avez pas accé(e) a cette page.</p></a>";
            }
                    }
                else{
               header('Location: index.php');
                    }  
                                               ?>
		  			    </div>

                    </section>
                </main>
                <footer>
<?php include('footer.php') ?>
                </footer>	
</body>
</html>
       



