<?php
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');
include('dbConfig.php');

session_start();


   
$email=$_SESSION['email'];
$numpiece=$_SESSION['numpiece'];
 
if (!empty($_POST['leFrmInsc']))
{ 

    $toutEstBon = true;

    $telbuEt="";
    $teldoEt="";
    $mobile2Et="";
    $faxEt="";
    $adpostEt="";
    $adgeoEt="";
    $infpEt="";
    




if ($_SERVER['REQUEST_METHOD']== "POST") 
{
   if ($db)
        {
        
       

        
    $telbuEt= $_POST['telbu'];
    $teldoEt= $_POST['teldo'];
    $mobile2Et= $_POST['mobile2'];
    $faxEt= $_POST['fax'];
    $adpostEt= $_POST['adpost'];
    $adgeoEt= $_POST['adgeo'];
    $infpEt= $_POST['infp'];
   
           
    
            
   if ($adgeoEt<>"")  
        
            {
       
    
        
                 
 

    
    
    
    
         
 
      
          $maRequeteSql = "UPDATE    POSTULANTE set FIX_BUR='".$telbuEt."' , FIX_DOM='".$teldoEt."' , MOBILE2='".$mobile2Et."' , FAX='".$faxEt."' , ADRESPOS='".$adpostEt."' , ADRES_GEO='".$adgeoEt."',INFOPERTINENTE='".$infpEt."' WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
    
                if (mysqli_query($db,$maRequeteSql))

            {
                
              
             
                 ?>
<script type="text/javascript">
   // alert("CONCENTI");
alert("Vos coordonnées ont été prises en compte. Veuillez renseigner vos référents.");
location.href ='Section8.php';
</script>
<?php
            
                }
            else
                {
            echo "Erreur : " . $maRequeteSql . "<br>" .mysqli_error($db);
                }
                      
                      

             
                
                 
                        
            }           
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
              if ($fin['adgeo'] !="")
              {
                     print("<script language = \"JavaScript\"> ");
                     print("location.href ='Section6.php';");
                     print("</script>");
              }
              else
              {
                  
                   ?>
                   <em class="super"><?php echo "Votre adresse géographique est attendue" ; ?></em>
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
                 <form action="Section7.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
            
            
      
  
                   
                   
                    
                                    <table id="CO">
                <tr>
                    
               <th> <label>Coordonnées</label></th>
               </tr>
                <tr>
                    
                    
                 <td ><label>Téléphone bureau:</label></td>
                 <td><textarea class="r" type="text" id="telbu" name="telbu" size="40"   maxlength="40" required onfocus="effaceprenom()" /> </textarea></td>
                 </tr>
                
                 <tr>
                     <tr>
                 <td><label>Téléphone Domicile :</label></td>
                 <td><textarea class="r" type="text" id="teldo" name="teldo" size="5" maxlength="40" required onfocus="effaceprenom()" /> </textarea></td>
               </tr>    
                                        
                 <tr>
                 
                     <td><label>Mobile 2 :</label></td>
                 <td><textarea class="r" type="text" id="mobile2" name="mobile2"   size="40" maxlength="40" required onfocus="effaceprenom()" /> </textarea> </td>
                         
                 </tr>
                                        
                  <tr>
                 <td><label>Fax :</label></td>
                 <td><textarea class="r" type="text" id="fax" name="fax" size="40"  maxlength="40" required onfocus="effaceprenom()" /> </textarea></td>
                     
                 </tr>                        
                          
                 <tr>
                 <td><label>Adresse Postale :</label></td>
                 <td><textarea class="r" type="text" id="adpost" name="adpost" size="40" maxlength="40" required onfocus="effaceprenom()" /> </textarea></td>
                     <td><label>Adresse géologique :</label></td>
                 <td><textarea class="r" type="text" id="adgeo" name="adgeo" size="40" maxlength="40" required onfocus="effaceprenom()" /></textarea></td>
                         
                 </tr>
                 <tr>
                         <td><label>Information Pertinente:</label></td>
                 <td><textarea  class="r" type="text" id="infp" name="infp" size="100" maxlength="100" required onfocus="effaceprenom()"> </textarea></td>               
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
