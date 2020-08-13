
<?php
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');
include('dbConfig.php');


  
session_start();


   
$email=$_SESSION['email'];
$numpiece=$_SESSION['numpiece'];

    $toutEstBon = true;

  $tpubEt= "";
    $tipubEt= "";
    $anpubEt="";
    $editeurEt= "";
   
    
     
    
  if (!empty($_POST['leFrmInsc']))
{ 




if ($_SERVER['REQUEST_METHOD']== "POST") 
{
   if ($db)
        {
              
    $tpubEt= $_POST['tpub'];
    $tipubEt=$_POST['tipub'];
    $anpubEt= $_POST['anpub'];
    $editeurEt= $_POST['editeur'];
   
    
   
            
    
        
    
            
         if ( ($tpubEt<>"")||($tipubEt<>"")||($anpubEt<>"")||($editeurEt<>""))
            
            
    
    
            
  
        
            {
       
    $envoiqua = "INSERT INTO PUBLICATION(TYPPUB,TITREPUB,ANNEE,EDITEUR)
    VALUES  ('".$tpubEt."','".$tipubEt."','".$anpubEt."','".$editeurEt."')";
    
    
     
          
                if  (mysqli_query($db,$envoiqua))
                    
                    

            {
                
            
               $selectqua= "select * from PUBLICATION where TYPPUB= '".$tpubEt."' and TITREPUB='".$tipubEt."' and ANNEE='".$anpubEt."' and EDITEUR='".$editeurEt."' ";
               
                
                $selectpos = "select * from POSTULANTE  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  "; 
                
                
                if ($selectqua1= mysqli_fetch_array(mysqli_query($db,$selectqua)))
                    {
                        if ($selectpos1= mysqli_fetch_array(mysqli_query($db,$selectpos)))
                          {
                            if ($selectpos1['PUBLICATION']=="" || $selectpos1['PUBLICATION']!="" )
                               {
                             $envwpos= "UPDATE POSTULANTE set PUBLICATION='".$selectqua1['IDPUB']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                               if(mysqli_query($db,$envwpos))
                                  {

                                    ?>
                                    <script type="text/javascript">
                                     
                                        location.href ='Section7.php';
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
                                echo "Erreur : PUBLICATION EXISTE DEJA";
                             }
                                
         }
                
            
            
            else
                {
            echo "Erreur : " . $selectpos1 . "<br>" .mysqli_error($db);
                }

            
    
      }
                                
         else
                {
            echo "Erreur : " . $selectqua1 . "<br>" .mysqli_error($db);
                }
                
                 }
                 else{
            echo "Erreur : " . $envoiqua . "<br>" .mysqli_error($db);
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
   
                     print("<script language = \"JavaScript\"> ");
                     print("location.href ='Section7.php';");
                     print("</script>");
             
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
                 <form action="Section6.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
            
      
  
                   
                    
                    <br>
                    
                     <table id="Publi">
                <tr>
                    
               <th> <label>Publication</label></th>
               </tr>
                <tr>
                 <td><label>Type de publication:</label></td>
                 <td><input type="text" id="tpub" name="tpub" size="100" maxlength="100" required onfocus="effaceprenom()" /></td>
                 </tr>
              
                <tr>
                 <td><label>Titre de la publication:</label></td>
                 <td><textarea type="text" id="tipub" name="tipub" size="100" maxlength="100" required onfocus="effaceprenom()"> </textarea></td>
                 </tr>
                
                 <tr>
                     <tr>
                 <td><label>Année:</label></td>
                 <td><input type="date" id="anpub" name="anpub" size="100" maxlength="100" required onfocus="effaceprenom()" /></td>
                 <tr>
                 <td><label>Editeur :</label></td>
                   <?php
    
    $query = $db->query("SELECT * FROM EDITEUR  ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <td><select name="editeur" id="editeur">
        <option   value=""> </option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['IDEDITEUR'].'">'.$row['NOMEDITEUR'].'</option>';
            }
        }else{
            echo '<option value="">Non valide</option>';
        }
        ?>
    </select></td>
                         
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
