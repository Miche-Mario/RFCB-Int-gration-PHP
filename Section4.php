<?php
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');
include('dbConfig.php');


  
session_start();


   
$email=$_SESSION['email'];
$numpiece=$_SESSION['numpiece'];

    $toutEstBon = true;

  $competenceEt= "";
    
    
     
    if (!empty($_POST['leFrmInsc']))
{ 
   




if ($_SERVER['REQUEST_METHOD']== "POST") 
{
   if ($db)
        {
              
    $competenceEt= $_POST['competence'];
   
   
            
    
        
    
            
         if  ($competenceEt<>"")
            
            
    
    
            
  
        
            {
       
                  $comp = "INSERT INTO COMPETENCE (COMPETENCE) VALUES  ('".$competenceEt."') ";
            
            
             
            if  ( mysqli_query($db,$comp) )
  
        
            {
    
     
          
               
            
               $selectqua= "select * from COMPETENCE where COMPETENCE= '".$competenceEt."' ";
               
                
                $selectpos = "select * from POSTULANTE  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  "; 
                
                
            /* etape1*/if ($selectqua1= mysqli_fetch_array(mysqli_query($db,$selectqua)))
                    {
            /* etape2*/       if ($selectpos1= mysqli_fetch_array(mysqli_query($db,$selectpos)))
                        {
                            if ($selectpos1['COMPETENCE1']=="" )//fin comp1 =vide
                               {
                             $envwpos= "UPDATE POSTULANTE set COMPETENCE1='".$selectqua1['IDCOMP']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                               if(mysqli_query($db,$envwpos))
                                  {

                                    ?>
                                    <script type="text/javascript">
                                      //  alert("VALIDE");
                                        location.href ='Section4.php';
                                    </script>
                                   <?php
                                  }
                                    else
                                    {
                                     echo "Erreur : " . $envwpos . "<br>" .mysqli_error($db);
                                    }

                          }
                      else
                            {
                                if ( $selectpos1['COMPETENCE2']=="" )
                                {
                                     $envwpos= "UPDATE POSTULANTE set COMPETENCE2='".$selectqua1['IDCOMP']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                                   if(mysqli_query($db,$envwpos))
                                      {

                                         
                                        ?>
                                    <script type="text/javascript">
                                      //  alert("VALIDE");
                                        location.href ='Section4.php';
                                    </script>
                                   <?php
                              }
                                    else
                                    {
                                     echo "Erreur : " . $envwpos . "<br>" .mysqli_error($db);
                                    }
                                }
                                
                            else{
                                if ( $selectpos1['COMPETENCE3']=="" )
                                {
                                     $envwpos1= "UPDATE POSTULANTE set COMPETENCE3='".$selectqua1['IDCOMP']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                                   if(mysqli_query($db,$envwpos1))
                                      {

                                       
                                  ?>
                                  <script type="text/javascript">
                                     alert("Vos trois domaines de compétences ont déja été pris en compte. Veuillez renseigner vos compétences lingustiques. ");
                                     location.href ='Section5.php';

                                  </script>
                                 <?php
                                }
                                    else
                                    {
                                     echo "Erreur : " . $envwpos1 . "<br>" .mysqli_error($db);
                                    }
                            
                     
                
    
             } } } }
                
            
            
            else
                {
            echo "Erreur : " . $selectpos1 . "<br>" .mysqli_error($db);
                }
    
      }// /*fin  etape2*/  
                                
         else
                {
            echo "Erreu : " . $selectqua1 . "<br>" .mysqli_error($db);
                }
                 }
                 else{
            echo "Erreur : " . $comp . "<br>" .mysqli_error($db);
                }
                 
                   } /*fin  etape1*/
    else
    {
          ?>
<em class="super"><?php echo "Veuiller remplir toutes les cases" ; ?></em>
          
       <?php 
    }
              }
    else
    {
        die("Echec Connection :" . mysqli_connect_error());
    }
    
     }
                
else
{
    $toutEstBon=false;
      }


 }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
if (!empty($_POST['fin']))
{
    $selectfin = "select * from POSTULANTE  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  "; 
    
          if($fin=mysqli_fetch_array(mysqli_query($db,$selectfin)))
          {
              if ($fin['COMPETENCE1'] !="" )
              {
                     print("<script language = \"JavaScript\"> ");
                     print("location.href ='Section5.php';");
                     print("</script>");
              }
              else
              {
                  
                   ?>
                   <em class="super"><?php echo "Valider au moins une domaine de compétence" ; ?></em>
                  <?php 
              }
          }
           else{
            echo "Erreur : " . $selectfin . "<br>" .mysqli_error($db);
                }
}


?>
    
    





    























<!doctype html>
<html lang="fr">
    
<head>
	<!-- Contenu du head --> 
	<meta charset="utf-8">
  
        <link href="css/Section2.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/city_state.js"></script>
    <script type="text/javascript" src="js/city_state2.js"></script>
       
    
   
	<title>Bienvenue au COCOFBJ</title>
</head>

<body>
 <div class = BarNav1>
     <ul>
        <li id="FlashInfo"><strong>FLASH INFO</strong></li>
        <li><marquee > Nous allons étendre notre intervention à l’ensemble des femmes du Bénin et de la diaspora</marquee></li>
        <li id="Langue"><a href="index.php">Fr|</a><a href="AccueilAnglais.php">En</a> </li>
        <li id="Inscription"><a href="Inscription.php">Inscription</a></li>
        <li id="MonCompte"><a href="Compte.php">Mon Compte</a></li>
    </ul> 
     
 </div>
    
    <div id="barner">
        <img src="image/affiche1.png" />
    </div>
    
    <nav>
        
        <ul>
  <li><a href="index.php"><strong>ACCUEIL</strong></a></li>
  <li><a href="Compendium.php"><strong>COMPENDIUM</strong></a></li>
  <li><a href="Actualite.php"><strong>ACTUALITE</strong></a></li>
  <li><a href="Consultation.php"><strong>CONSULTATION</strong></a></li>
  <li><a href="Sinscrire.php"><strong>S'INSCRIRE</strong></a></li>
  <li><a href="#Contact.php"><strong>CONTACT</strong></a></li>
  <li><input type="text" id="recherche" name="recherche" size="20" maxlength="20" required onfocus="effacepwd()" /></li>
  <li><input type="submit" value="Rechercher" /></li>
     </ul> 
    
    
    
    </nav>
    
    
    <div id="bloc">
    
    <section class="Texte">
    
        <p class="EP">EXPERIENCES PROFESSIONNELLES</p><br>
            <div id="table">
                <form action="Section4.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
                      <table id="DC">
              
                    <tr>
                     <th><label>Domaine de compétence clés</label></th>   
                    </tr>  
              <tr>
                        
            
                          <td><label >Domaine de compétence  :</label></td>
                           
    <td><input type="text" id="competence" name="competence" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
                  </tr>
                
                
                
                   
          
             
    
  </table>
                   
                    
                    
                     
                     
                    
                    
                       
                                            
            
                <p class="Bouton1"><a href="Inscription.php"><input id="Précédent" type="button" value="Annuler" /></a> <input id="Valider" type="submit" value="Valider" name="leFrmInsc" /> </form><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"><input id="suivant1" name="fin" type="submit" value="Page suivante" /></form></p> 
                
                
        </div>
        </section>
        <footer>
		    <div>
           <img id="encr" src="image/piedpage.png"style="height : 122px; width : 1092px;" >
               </div> 
			   
            
            <p id="bas"> © 2018 Copyright  BAANI RIFONGA WANEP - Tous droits réservés</p>
                     
        
        
        </footer>
   
    </div>
       

</body>
</html> 
