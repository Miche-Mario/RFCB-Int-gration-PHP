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

  $diplomeEt= "";
    $specialiteEt= "";
    $niveauEt="";
    $equivalenceEt= "";
    $mentionEt= "";
    $dateEt="";
    $countryEt= "";
    $cityEt="";
    $universiteEt="";
    
     
    
   




if ($_SERVER['REQUEST_METHOD']== "POST") 
{
   if ($db)
        {
              
    $diplomeEt= $_POST['diplome'];
    $specialiteEt=$_POST['specialite'];
    $niveauEt= $_POST['niveau'];
    $equivalenceEt= $_POST['equivalence'];
    $mentionEt= $_POST['mention'];
    $dateEt= $_POST['date'];
    $countryEt= $_POST['country'];
    $cityEt= $_POST['city'];
    $universiteEt= $_POST['universite'];
    
   
            
    
        
    
            
         if ( ($diplomeEt<>"")||($specialiteEt<>"")||($niveauEt<>"")||($mentionEt<>"")||($dateEt<>"")||($countryEt<>"")||($cityEt<>"")||($universiteEt<>""))
            
         {
    
     $speci = "INSERT INTO SPECIALITE  (SPECIALITE)
    VALUES  ('".$specialiteEt."') ";
            
             $univ = "INSERT INTO UNIVERSITE (UNIVERSITE)
    VALUES  ('".$universiteEt."') ";
            
            
             
            if  (mysqli_query($db,$speci) && mysqli_query($db,$univ) )
  
        
            {
                
                $sspeci= "select * from SPECIALITE where SPECIALITE= '".$specialiteEt."' ";
              $suniv= "select * from UNIVERSITE where UNIVERSITE= '".$universiteEt."' ";
            
                 if ($sspeci1= mysqli_fetch_array(mysqli_query($db,$sspeci))  )
                    {
                         if ($suniv1= mysqli_fetch_array(mysqli_query($db,$suniv))  )
                    {
       
    $envoiqua = "INSERT INTO QUALIFICATION(DIPLOME,SPECIALITE,NIVEAU,EQUIVDIP,MENTIONQUAL,DATEQUA,PAYS,COMMUNE,UNIVERSITE)
    VALUES  ('".$diplomeEt."','".$sspeci1['IDSPE']."','".$niveauEt."','".$equivalenceEt."','".$mentionEt."','".$dateEt."','".$countryEt."','".$cityEt."','".$suniv1['IDUNIV']."')";
    
    
     
          
                if  (mysqli_query($db,$envoiqua))
                    
                    

            {
               
                
            
               $selectqua= "select * from QUALIFICATION where DIPLOME= '".$diplomeEt."' and SPECIALITE='".$sspeci1['IDSPE']."' and NIVEAU='".$niveauEt."' and MENTIONQUAL='".$mentionEt."' ";
               
                
                $selectpos = "select * from POSTULANTE  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  "; 
                
                
                if ($selectqua1= mysqli_fetch_array(mysqli_query($db,$selectqua)))
                    {
                        if ($selectpos1= mysqli_fetch_array(mysqli_query($db,$selectpos)))
                          {
                            if ($selectpos1['QUALIFICATION1']=="" && $selectpos1['QUALIFICATION2']=="" )
                               {
                             $envwpos= "UPDATE POSTULANTE set QUALIFICATION1='".$selectqua1['IDQUAL']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                               if(mysqli_query($db,$envwpos))
                                  {

                                    ?>
                                    <script type="text/javascript">
                                      //  alert("VALIDE");
                                        location.href ='Section2.php';
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
                                if ( $selectpos1['QUALIFICATION2']=="" )
                                {
                                     $envwpos= "UPDATE POSTULANTE set QUALIFICATION2='".$selectqua1['IDQUAL']."'  WHERE EMAIL= '".$email."' and CIN='".$numpiece."'  ";
                                
             
                                   if(mysqli_query($db,$envwpos))
                                      {

                                         
                                             ?>
                                  <script type="text/javascript">
                                   alert("Vos deux qualifications ont déja été prises en compte. Veuillez renseigner vos deux fonctions occupées. ");
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
                                       /* {
                                    echo "Erreur : " . $selectpos1 . "<br>" .mysqli_error($db);
                                        }
                                        */
                                  ?>
                                  <script type="text/javascript">
                                     alert("Vos deux qualifications ont déja été prises en compte. Veuillez renseigner vos deux fonctions occupées. ");
                                     location.href ='Section3.php';

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
            echo "Erreur : " . $suniv1 . "<br>" .mysqli_error($db);
                }
                         }
                 else{
            echo "Erreur : " . $sspeci1 . "<br>" .mysqli_error($db);
                }
                
                 }
                 else{
            echo "Erreur : " . $speci . $univ . "<br>" .mysqli_error($db);
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
              if ($fin['QUALIFICATION1'] != "" )
              {
                     print("<script language = \"JavaScript\"> ");
                     print("location.href ='Section3.php';");
                     print("</script>");
              }
              else
              {
                  
                   ?>
                   <em class="super"><?php echo "Valider au moins une qualification" ; ?></em>
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
        <li><marquee >Nous allons étendre notre intervention à l’ensemble des femmes du Bénin et de la diaspora</marquee></li>
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
        
        <form action="Section2.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
    
        <p class="SF">QUALIFICATION</p><br>
            <div id="table">
              
            
      
           
                    
                    
                    
                        <table class="Qua1">
                <tr>
                    
               <th> <label>Qualification </label></th>
               </tr>
                <tr>
                       <?php

  $diplome= mysqli_query($db,'SELECT * FROM DIPLOME' );


    ?>
                 <td><label>Diplome/Certificat :</label></td>
                  <td><select name="diplome" id="diplome">
                 <option value=""></option>
                    <?php
                    while ($dip= mysqli_fetch_array($diplome))
                     {  echo '<option value="'.$dip['IDDIP'].'">'.$dip['INTITULEDIP'].'</option>';  } ?>

                   </select></td>
                 </tr>
          
             <tr>
                  <?php
                  $specialite= mysqli_query($db,'SELECT * FROM SPECIALITE' );
                  ?>
                 <td><label>Spécialité :</label></td>
                 <td><input type="text" id="specialite" name="specialite" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
              </tr>
             
              <tr>
                  
                   <?php $niveau= mysqli_query($db,'SELECT distinct NIVEAUDIP FROM DIPLOME order by NIVEAUDIP asc' );


    ?>
                  <td><label>Niveau :</label></td>
                  <td><select name="niveau" id="niveau">
                 <option value=""></option>
                    <?php
                    while ($niv= mysqli_fetch_array($niveau))
                     {  echo '<option value="'.$niv['NIVEAUDIP'].'">'.$niv['NIVEAUDIP'].'</option>';  } ?>

                   </select></td>
                  <td><label> Equivalence : </label></td>
                   <td>
                        <?php $equivalence= mysqli_query($db,'SELECT * FROM DIPLOME' ); ?>
                       
                       <select name="equivalence" id="equivalence">
                 <option value=""></option>
                    <?php
                    while ($equi= mysqli_fetch_array($equivalence))
                     {  echo '<option value="'.$equi['INTITULEDIP'].'">'.$equi['INTITULEDIP'].'</option>';   } ?>

                   </select></td>
              </tr>
              <tr>
                    <td><label>Mention : </label></td>
                  <td><select id="mention" name="mention" onfocus="effacefiliere()">
                           
							<option value="PAS">Pasable</option>
                            <option value="ASS">Assez-Bien</option>
							<option value="BIE">Bien</option>
                            <option value="TBI">Très Bien</option>
                            <option value="EXE">Exellent</option>
                            <option value="HON">Hornorable</option>
						</select></td>
                  <td><label>Année : </label>
                    <td><input type="date" id="date" name="date" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
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
            </tr>
            <tr>
            <td><label>Université :</label></td>
            <td><input type="text" id="universite" name="universite" size="40" maxlength="40" required onfocus="effaceprenom()" /></td>
            </tr>  	
			
      
    
  </table>
           
                    
                   <p class="Bouton"><a href="Inscription.php"><input id="Précédent" type="button" value="Annuler" /></a> <input id="Valider" type="submit" value="Valider" name="leFrmInsc" /> </form><form action="Section2.php" method="post"><input id="suivant" name="fin" type="submit" value="Page suivante" /></form></p>  
            
            
            
                     
              
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