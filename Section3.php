
<?php
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');
include('dbConfig.php');


  
session_start();

 
   
$email=$_SESSION['email'];
$numpiece=$_SESSION['numpiece'];

    $toutEstBon = true;
if (!empty($_POST['leFrmInsc']))
{
  $posteEt= "";
    $duEt= "";
    $aEt="";
    $nomentreEt= "";
    $countryEt= "";
    $cityEt="";
   
    
     
    
   




if ($_SERVER['REQUEST_METHOD']== "POST") 
{
   if ($db)
        {
              
    
   $posteEt= $_POST['poste'];
    $duEt= $_POST['pdu'];
    $auEt=$_POST['pau'];
    $nomentreEt= $_POST['nomentre'];
    $countryEt= $_POST['country'];
    $cityEt=$_POST['city'];
    
   
            
    
        
    
            
         if ( ($posteEt<>"")||($duEt<>"")||($auEt<>"")||($nomentreEt<>"")||($countryEt<>"")||($cityEt<>""))
            
            
    
    
            
  
        
            {
                   $post = "INSERT INTO POSTE (POSTE) VALUES  ('".$posteEt."') ";
            
            
             
            if  ( mysqli_query($db,$post) )
  
        
            {
                 $spost= "select * from POSTE where POSTE= '".$posteEt."' ";
            
                 if ($spost1= mysqli_fetch_array(mysqli_query($db,$spost))  )
                    {
       
    $envoiqua = "INSERT INTO FONCTION(POSTE,DATEDEBUT,DATEFIN,ENTREPRISE,PAYS,COMMUNE)
    VALUES  ('".$spost1['IDPOSTE']."','".$duEt."','".$auEt."','".$nomentreEt."','".$countryEt."','".$cityEt."')";
    
    
     
          
                if  (mysqli_query($db,$envoiqua))
                    
                    

            {
                
            
               $selectqua= "select * from FONCTION where POSTE= '".$spost1['IDPOSTE']."' and DATEDEBUT='".$duEt."' and DATEFIN='".$auEt."' and ENTREPRISE='".$nomentreEt."' ";
               
                
                $selectpos = "select * from POSTULANTE  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  "; 
                
                
                if ($selectqua1= mysqli_fetch_array(mysqli_query($db,$selectqua)))
                    {
                        if ($selectpos1= mysqli_fetch_array(mysqli_query($db,$selectpos)))
                          {
                            if ($selectpos1['FONCTION1']=="" && $selectpos1['FONCTION2']=="" )
                               {
                             $envwpos= "UPDATE POSTULANTE set FONCTION1='".$selectqua1['IDFONC']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                               if(mysqli_query($db,$envwpos))
                                  {

                                    ?>
                                    <script type="text/javascript">
                                      //  alert("VALIDE");
                                        location.href ='Section3.php';
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
                                if ( $selectpos1['FONCTION2']=="" )
                                {
                                     $envwpos= "UPDATE POSTULANTE set FONCTION2='".$selectqua1['IDFONC']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                                   if(mysqli_query($db,$envwpos))
                                      {

                                         
                                             ?>
                                  <script type="text/javascript">
                                   alert("Vos deux fonctions ont déja été prises en compte. Veuillez renseigner vos deux compétences. ");
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
                                       /* {
                                    echo "Erreur : " . $selectpos1 . "<br>" .mysqli_error($db);
                                        }
                                        */
                                  ?>
                                  <script type="text/javascript">
                                     alert("Vos deux fonctions ont déja été prises en compte. Veuillez renseigner vos compétences . ");
                                     location.href ='Section4.php';

                                  </script>
                                 <?php
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
                 else{
            echo "Erreur : " . $spost1 . "<br>" .mysqli_error($db);
                }
                
                 }
                 else{
            echo "Erreur : " . $post . $univ . "<br>" .mysqli_error($db);
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
              if ($fin['FONCTION1'] !="" )
              {
                     print("<script language = \"JavaScript\"> ");
                     print("location.href ='Section4.php';");
                     print("</script>");
              }
              else
              {
                  
                   ?>
                   <em class="super"><?php echo "Valider au moins une fonction" ; ?></em>
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
                 <form action="Section3.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
            
      
           
                     <table id="fonc1">
                <tr>
                    
               <th> <label>Fonction </label></th>
               </tr>
                <tr>
                    
                 <td><label>Poste Occupé :</label></td>
                 <td><input type="text" id="poste" name="poste" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
                 </tr>
                 </tr>
          
             <tr>
                 <td><label>Période : </label></td>
                 <td>du <input type="date" id="pdu" name="pdu" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
                 <td>au <input type="date" id="pau" name="pau" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
              </tr>
             
              <tr>
                  <td><label>Entreprise/Organisation :</label></td>
                  <td><textarea type="text" id="nomentre" name="nomentre" size="70" maxlength="900" required onfocus="effaceprenom()"> </textarea></td>
                 
              </tr>
             <tr>
                 <td><label>Pays:</label></td>
                 <td><label>Département:</label></td>
                 <td><label>Commune:</label></td>
                            
             </tr>
          
              <tr>
                 <style type="text/css">

#country,#state,#city{
    font-family: Georgia;
    font-size: 15px;
    width : 210px;
}
</style>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'IDPAYS='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Dépar/Province en premier</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Pays en premier</option>');
            $('#city').html('<option value="">Dépar/Province en premier</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'IDDEP='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Dépar/Province en premier</option>'); 
        }
    });
});
</script>
                   
                   <div class="select-boxes">
    <?php
    
    $query = $db->query("SELECT * FROM PAYS WHERE status = 1 ORDER BY PAYS ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <td><select name="country" id="country">
        <option value="">Sélectionnes Pays</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['IDPAYS'].'">'.$row['PAYS'].'</option>';
            }
        }else{
            echo '<option value="">Non valide</option>';
        }
        ?>
    </select></td>
    
    <td><select name="state" id="state">
        <option value="">Pays en premier</option>
    </select></td>
    
    <td><select name="city" id="city">
        <option value="">Dépar/Province en premier</option>
    </select></td>
    </div>
            </tr><br><br><br>
    
  </table>
            </div>
        
             
                   
                           
              <p class="Bouton"><a href="Section2.php"><input id="Précédent" type="button" value="Annuler" /></a> <input id="Valider" type="submit" value="Valider" name="leFrmInsc" /> </form><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"><input id="suivant" name="fin" type="submit" value="Page suivante" /></form></p> 
              
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


















 
