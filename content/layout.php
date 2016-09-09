
<?php 
    session_start();
                            try
                            {
                                $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
                            }
                            catch(Exception $e)
                            {
                                die("erreur de connection");
                            }



                               if(isset($_POST['connect']))
                                {
                                    $login = $_POST['login'];
                                    $mdp = sha1($_POST['mdp']);

                                    $requete = $bdd->query("SELECT * FROM user 
                                                            WHERE login ='".$login."' 
                                                            AND mdp ='".$mdp."'");

                                    if($reponse = $requete->fetch())
                                    {
                                        $_SESSION['connecte'] = true;
                                        $_SESSION['id'] = $reponse['id_u'];
                                         
                                    }
                                    else
                                    {
                                        echo "<div class='cant'>Nom d'utilisateur ou mot de passe incorect</div>";
                                    }
                                }
                                
                                
if(isset($_SESSION['connecte']))
{
                         $requetezer = $bdd->query("SELECT * FROM user WHERE id_u  = ".$_SESSION['id']."");
                            $pseudo = $requetezer->fetch();
}
                       
                          ?>  


<!DOCTYPE html>
<html>
	<head>  
	<title> King Park </title>
		<meta charset="utf-8" /><!-- encodage -->
		<meta name="author" content="OXEN&copy;" /><!-- auteur -->
		<meta name="description" content="Test" /><!-- description du site -->
		<meta name="keywords" content="" /><!-- mot cle en rapport ave cle site -->
		<link rel="stylesheet" href="css/style.css" /><!-- lien vers le css-->
        <link href="zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="shortcut icon" href="img/favico.ico">

	</head>
<body>
       
        <header>
          
                    <?php 
                        if(isset($_SESSION['connecte'])){
                           
                                    echo $pseudo['login']."<br>";
                                    echo "<img src=".$pseudo['avatar'].">"; }
                                    ?></div>
                             <div class="head">
               
                  
                        
                                   
                                   
                            <?php if(isset($_SESSION['connecte'])){
                                    
                                    
                                   
                                    echo "<li><a href=index.php>accueil</a></li>";                                
                                    echo "<li><a href=index.php?page=compte.php>votre compte</a></li>";
                                    echo "<li><a href=index.php?page=message.php>message</a></li>";
                                    echo "<li><a href=index.php?page=logout.php>logout</a></li>";
                                    echo "<li><a href=index.php?page=test.php>PAGE TEST</a><br></li>";
                                   
                                   
                                }
                                else
                                {  
                                echo "<form action='index.php' method='post' class='menu'>";
                                echo "<input type='text' name='login' placeholder='Nom d utilisateur'/>";
                                echo "<input type='password' name='mdp' placeholder='Mot de Passe'/>";
                                echo "<input type='submit' name='connect' value='Connexion'/>";
                                echo "</form>";
                                echo "<li><a href=index.php?page=register.php>Pas encore inscrit ?</a></li>";
                                echo "<li><a href=index.php>accueil</a></li>";
                                }
                            ?>
                    
           </div>
        </header>

        
           
         
        
            
            
		
                        <div class="container">   
                          
  
			             <?php require $contenu;?>
		              </div>
		  
    
		    
		              

		              


                    <footer>
                            <div class="foot">
                                <div class="copyright">
                                    <p>&copy; Copyrights | OXEN </p>
                                    </div>
				
				                            <div class="footer_social">
				                                <ul>
                                                    <li><a href="https://www.facebook.com/ArceauManagement/timeline?ref=page_internal"><img src="img/fb.png" alt="facebook"></a></li>
                                                    <li><a href="https://twitter.com/arceaumanage"><img src="img/twitter.png" alt="twitter"></a></li> 
                                                    <li><a href="https://www.youtube.com/"><img src="img/yt.png" alt="yt"></a></li>
                                                    <li><a href="#" class="gotop"><img class="icotop" src="img/fleche.png"></a></li>
                                                </ul>
			                                 </div>
        
                    
    
                                </div>        
     
                        </footer>   
    
            </body>

</html>
