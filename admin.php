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

                        if($array['grade']==3)
                       {
                           header('Location: index.php');
                       }
				
                        else
                        {
                   
                        ?>

                <section>
                    <div>
	                    <form  class="forme"method="post">
                            <fieldset>
                            <legend>NEW TOPIC</legend>
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


                        }	
                        ?>
                        </div>
                    </section>



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
						$sujet=$_POST['sujet'];
						$delet="DELETE FROM `Sujets` WHERE titre='$sujet'";
						$quer= mysqli_query($base,$delet);
                        echo "<p class='bug'>$sujet supprimée avec succès !</p>";

                    }


                    ?>
                        </div>

                    <?php
                    
                    if($array['grade']==1)
                    {


                    ?>

                        <div>
                            <form class="forme" method="post" action="">
                                <fieldset>
                                    <legend>Gestion des droits</legend>
                                    <input type="text" name="login" placeholder="login"/>
                                    <input type="text" name="id" placeholder="grade"/>
                                    <input type="submit" name="modif" value="modifier"/>
                                </fieldset>
                            </form>  
                        </div>

                    
                    <?php 
                      if(isset($_POST['modif']))
                        {
                            $id=$_POST['id'];
                            $login=$_POST['login'];
                            $insert="UPDATE utilisateurs SET grade = '$id' WHERE login = '$login'";
                            $result= mysqli_query($connexion, $insert);
                            echo'<p class="bug">modifier avec succés</p>';

                        }
                    }

                    } 
                }
                else
                {
                    header('Location: index.php');


                }
                                            
		  		 ?>	    

                    </section>
                </main>
                <footer>
<?php include('footer.php') ?>
                </footer>	
</body>
</html>
       



