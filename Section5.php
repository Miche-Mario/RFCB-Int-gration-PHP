

<?php
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');
include('dbConfig.php');


  
session_start();


   
$email=$_SESSION['email'];
$numpiece=$_SESSION['numpiece'];

    $toutEstBon = true;

  $langueEt= "";
    
    
     
   if (!empty($_POST['leFrmInsc']))
{  
   




if ($_SERVER['REQUEST_METHOD']== "POST") 
{
   if ($db)
        {
              
    $langueEt= $_POST['langue'];
   
   
            
    
        
    
            
         if  ($langueEt<>"")
            
            
    
    
            
  
        
            {
       
  
    
     
          
               
            
               $selectqua= "select * from langue where IDLANGUE= '".$langueEt."' ";
               
                
                $selectpos = "select * from POSTULANTE  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  "; 
                
                
            /* etape1*/if ($selectqua1= mysqli_fetch_array(mysqli_query($db,$selectqua)))
                    {
            /* etape2*/       if ($selectpos1= mysqli_fetch_array(mysqli_query($db,$selectpos)))
                        {
                            if ($selectpos1['LANGUE1']=="" )//fin comp1 =vide
                               {
                             $envwpos= "UPDATE POSTULANTE set LANGUE1='".$selectqua1['IDLANGUE']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                               if(mysqli_query($db,$envwpos))
                                  {

                                    ?>
                                    <script type="text/javascript">
                                      //  alert("VALIDE");
                                        location.href ='Section5.php';
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
                                if ( $selectpos1['LANGUE2']=="" )
                                {
                                     $envwpos= "UPDATE POSTULANTE set LANGUE2='".$selectqua1['IDLANGUE']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                                   if(mysqli_query($db,$envwpos))
                                      {

                                         
                                        ?>
                                    <script type="text/javascript">
                                      //  alert("VALIDE");
                                        location.href ='Section5.php';
                                    </script>
                                   <?php
                              }
                                    else
                                    {
                                     echo "Erreur : " . $envwpos . "<br>" .mysqli_error($db);
                                    }
                                }
                                
                            else{
                                if ( $selectpos1['LANGUE3']=="" )
                                {
                                     $envwpos1= "UPDATE POSTULANTE set LANGUE3='".$selectqua1['IDLANGUE']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                                   if(mysqli_query($db,$envwpos1))
                                      {

                                       
                                  ?>
                                  <script type="text/javascript">
                                     alert("Vos trois compétences lingustiques ont déja été pris en compte. Veuillez renseigner une publication si vous en avez. ");
                                     location.href ='Section6.php';

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
              if ($fin['LANGUE1'] !="")
              {
                     print("<script language = \"JavaScript\"> ");
                     print("location.href ='Section6.php';");
                     print("</script>");
              }
              else
              {
                  
                   ?>
                   <em class="super"><?php echo "Valider au moins une langue" ; ?></em>
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
                <form action="Section5.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
                    
                    
                    
                 
                         
                           <table id="ConLin1">
                <tr>
                <th> <label>Compétence lingustisque</label></th>
                </tr>
                <tr>
                 <td><label>Langue :</label></td>
                   <?php
    
    $query = $db->query("SELECT *  FROM LANGUE  ORDER BY LANGUE ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <td><select name="langue" id="langue">
        <option value=""> </option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['IDLANGUE'].'">'.$row['LANGUE'].'</option>';
            }
        }else{
            echo '<option value="">Non valide</option>';
        }
        ?>
    </select></td>
                    <td><label>Niveau d'écriture :</label></td>
                 <td> <select name="niveau" id="niveau">
		<option  value="PAS">Passable</option>
		<option  value="ASB">Assez Bien</option>
		<option  value="BIE"> Bien</option>
		<option  value="TBI">Très Bien</option>
		<option  value="EXC">Excellente</option>
                     </select></td>
                 </tr>
          
              
          
            
           
    
  </table>
                    
                    
                       
                                            
            
                 <p class="Bouton1"><a href="Inscription.php"><input id="Précédent" type="button" value="Annuler" /></a> <input id="Valider" type="submit" value="Valider" name="leFrmInsc" /> </form><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"><input id="suivant1" name="fin" type="submit" value="Page suivante" /></form></p> 
                
                </form>
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
