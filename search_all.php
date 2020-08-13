<!doctype html>
<html lang="fr">
    
<head>
	<!-- Contenu du head --> 
	<meta charset="utf-8">
  
        <link href="css/ad.css" rel="stylesheet" type="text/css" />
   
       
    
   
	<title>Administration</title>
</head>

<body>


<div class = BarNav1>
     <ul>
        <li id="FlashInfo"><strong>FLASH INFO</strong></li>
        <li><marquee > Nous allons étendre notre intervention à l’ensemble des femmes à l'intérieur du Bénin et de la diaspora.</marquee></li>
        <li id="Inscription"><a href="Sinscrire.php">Inscription</a></li>
       
    </ul>    
 </div>
    
<div id="barner">
    <img src="image/affiche1.png" />
</div>
    
<nav>
     <ul>
        <li><a href="index.php"><strong>ACCUEIL</strong></a></li>
        <li><a href="search_all.php"><strong>CONSULTATION</strong></a></li>
        <li><a href="Sinscrire.php"><strong>S'INSCRIRE</strong></a></li>
        <li><a href="#encr"><strong>CONTACT</strong></a></li>
        <li><input type="text" id="recherche" name="recherche" size="20" maxlength="20" required onfocus="effacepwd()" /></li>
        <li><input type="submit" value="Rechercher" /></li>
    </ul> 
</nav>

<div class="section1">
    <div class="bloc"> 
     <h4>PAGE DE RECHERCHE MULTICLITERE</h4>
        <section >
            <form action="search_all.php" method="post"  name="leFrmInsc" onsubmit="return(peutonvalider());">
                <table>
                        <tr>       
                            <script src="jquery.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function(){
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
                                                $('#city').html('<option value=""></option>');
                                                
                                            }
                                        });
                                    });
                                </script>
                   
                                <div class="select-boxes">
                                    <?php
                                    //Include database configuration file
                                    include('dbConfig.php');
                                    //Get all departement data
                                    $query = $db->query("SELECT * FROM DEPARTEMENT WHERE IDPAYS = 20 AND status = 1 ORDER BY DEPARTEMENT ASC");
                                    //Count total number of rows
                                    $rowCount = $query->num_rows;
                                    ?>
                           <td> <label>DEPARTEMENT:</label></td>
                           <td><select name="state" id="state">
                                <option value="NON RENSEIGNE"></option>
                                <?php
                                if($rowCount > 0){
                                    while($row = $query->fetch_assoc()){ 
                                    echo '<option value="'.$row['IDDEP'].'">'.$row['DEPARTEMENT'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Non valide</option>';
                                }
                                ?>
                                </select>     
                            </td>   
                            <td><label>COMMUNE:</label></td>
                            <td>  <select style="width:150px;" name="city" id="city">
                                <option value="NON RENSEIGNE"></option> 
                                </select>
                            </td>
                            <td><label>DIPLOME:</label></td>
                            <td>
                                <?php
                                //Include database configuration file
                                include('dbConfig.php');
                                
                                //Get all diploma data
                                $query = $db->query("SELECT * FROM DIPLOME   ORDER BY poids  ASC");
                                
                                //Count total number of rows
                                $rowCount = $query->num_rows;
                                ?>
                                <select name="diplome" id="diplome" >
                                <option value="NON RENSEIGNE" > </option>
                                <?php
                                if($rowCount > 0){
                                    while($row = $query->fetch_assoc()){ 
                                            echo '<option value="'.$row['INTITULEDIP'].'">'.$row['INTITULEDIP'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Non valide</option>';
                                }
                                
                                ?>
                                </select>
                            </td>
                            <td><label>AGE:</label></td>
                            <td><label>DE </label><input style="width:15px;" maxlength="2" size="2" type="text" name="de" />
                            <label>A</label>
                            <input style="width:15px;"input type="text" maxlength="2" size="2" name="a" /></td>
                            
                            


                            

                            <td><input id="Valider" type="submit" value="Valider" name="leFrmInsc"  /> 
                            </td>
                        </tr>
                        </table>
                        <table>       
                       <tr style="background-color: #5000a9 ; color:white;">
                            <td style="width:300px; text-align:center;"><label><strong>PIÈCE D'IDENTITÉ</strong></label></td>
                            <td style="width:300px; text-align:center;"><label><strong>POSTULANTE</strong></label></td>
                            <td style="width:200px; text-align:center;"><label><strong>DATE DE NAISSANCE</strong></label></td>
                            <td style="width:200px; text-align:center;"><label><strong>CONTACT(S)</strong></label></td>
                            <td style="width:200px; text-align:center;"><label><strong>EMAIL</strong></label></td>
                            <td style="width:300px; text-align:center;"><label><strong>VILLE</strong></label></td>
                            <td style="width:100px; text-align:center;"><label><strong>DIPLÔME</strong></label></td>
                            <td style="width:100px; text-align:center;"><label><strong>SPÉCIALITÉ</strong></label></td>
                            <td style="width:100px; text-align:center;"><label><strong>ÂGE</strong></label></td>
                        </tr>
                        
 
 <?php

include('dbConfig.php');
             if (!empty($_POST['leFrmInsc'])){ 
                 include('dbConfig.php');
                 if ($_SERVER['REQUEST_METHOD']== "POST") 
                 {      
                 $depat=$_POST['state'];
                 $ville=$_POST['city'];
                 $diplome=$_POST['diplome'];
                 $de=$_POST['de'];
                 $a=$_POST['a'];
                 
				 
				  //Début | cas 0 : Toutes les cases sont vides
				  
         if ( $depat == " NON DEFINI" && $ville == " NON DEFINI" && $diplome == " NON DEFINI" && $de == "" && $a == ""){ 
				  				  
				  $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                  FROM postulante, departement, commune, qualification, diplome, specialite
                     
                  WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe))

    			  group by POSTULANTE.IDPOS
				 
				  ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC';

                  include('cas.php');
				  
         }
				 
                //Fin | cas 0 : Toutes les cases sont vides
				 
				 
				 
				 
                  //Début | cas 1 : Toutes les cases sont remplies
				  
                  if ( $depat != "" && $ville != "" && $diplome != "" && $de != "" && $a != ""){ 
				  				  
				  $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                  FROM postulante, departement, commune, qualification, diplome, specialite
                     
                  WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) and (diplome.INTITULEDIP = "'.$diplome.'") AND (YEAR(current_timestamp) - YEAR(postulante.NE_LE) between "'.$de.'" and "'.$a.'")

    				  group by POSTULANTE.IDPOS
					 
					 having max(poids) 
					 
					 ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC';

                  include('cas.php');
				  
                 }
				 
                //Fin | cas 1 : Toutes les cases sont remplies

     
                //Début | cas 2 : Toutes les cases sont remplies sauf l'age
				
                  if ( $depat != "" && $ville != "" && $diplome != "" && $de == "" && $a == ""){  
				  
                     $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) and (diplome.INTITULEDIP = "'.$diplome.'") ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC ';

                     $affiche= 'select count(POSTULANTE.IDPOS)

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) and (diplome.INTITULEDIP = "'.$diplome.'")';
                     
                    include('cas.php');
                 }
                //Fin | cas 2 : Toutes les cases sont remplies sauf l'age
				

	            //Début | cas 3 : Toutes les cases sont remplies sauf le diplome
				
				
                  if ( $depat != "" && $ville != ""  && $diplome = "NON DEFINI"  && $de != "" && $a != ""){  
				  
                     $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) AND (YEAR(current_timestamp) - YEAR(postulante.NE_LE) between "'.$de.'" and "'.$a.'")
					 
					 group by POSTULANTE.IDPOS
					 
					 having max(poids) 
					 
					 ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC';


                     $affiche = 'select count(POSTULANTE.IDPOS)

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                                          WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) AND (YEAR(current_timestamp) - YEAR(postulante.NE_LE) between "'.$de.'" and "'.$a.'") ';
			  
					  //$lostt= mysqli_fetch_array($affichee);
                      include('cas.php');
					  
					  //$query = mysql_query(SELECT * FROM table);
                      
					  
                 }

				 
                //Fin | cas 3 : Toutes les cases sont remplies sauf le diplome		
	 
	 
	            //Début | cas 4 : Toutes les cases sont remplies sauf la commune
				
				
                  if ( $depat != "" && $ville = " NON DEFINI" && $diplome != "" && $de != "" && $a != ""){  
				  
                     $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=(select departement.iddep from departement where departement.departement = "'.$depat.'" )  and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) and (diplome.INTITULEDIP = "'.$diplome.'") AND (YEAR(current_timestamp) - YEAR(postulante.NE_LE) between "'.$de.'" and "'.$a.'")  
					 
					 ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC';
					 
					 
					 
                    /*$affiche = 'select count(POSTULANTE.IDPOS)

                    FROM postulante, departement
                     
                                     
					WHERE postulante.reside_a_dep=(select departement.iddep from departement where departement.departement = "'.$depat.'" )';
					 

                     if ($affichee == mysqli_query($db,$affiche)){ 
                                    
                        if($lostt == mysqli_fetch_array($affichee)){ 
                            ?>
                    
                            <h5 style='color:red;'><img style=' margin-left: 35%;width:25px; height:25px;' src='image/valider.png'> <?php echo ''.$lostt['count(POSTULANTE.IDPOS)'].'' ;  ?> femme(s) compétente(s) trouvée(s).</h5> 
                            <?php 
                        }}*/
                    include('cas.php');
                 }
				 
                //Fin | cas 4 : Toutes les cases sont remplies sauf la commune
	 
	 
	 	 
	            //Début | cas 5 : Toutes les cases sont remplies sauf le département
				
                  if ( $depat == "" && $ville == "" && $diplome != "" && $de != "" && $a != ""){  
				  
                     $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) and (diplome.INTITULEDIP = "'.$diplome.'") AND (YEAR(current_timestamp) - YEAR(postulante.NE_LE) between "'.$de.'" and "'.$a.'")  ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC ';

                     /*$affiche= 'select count(POSTULANTE.IDPOS)

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                    WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) and (diplome.INTITULEDIP = "'.$diplome.'") AND (YEAR(current_timestamp) - YEAR(postulante.NE_LE) between "'.$de.'" and "'.$a.'") ';
                     

                     if ($affichee= mysqli_query($db,$affiche)){ 
                                    
                        if($lostt= mysqli_fetch_array($affichee)){ 
                            ?>
                    
                            <h5 style='color:red;'><img style=' margin-left: 35%;width:25px; height:25px;' src='image/valider.png'> <?php echo ''.$lostt['count(POSTULANTE.IDPOS)'].'' ;  ?> femme(s) compétente(s) trouvée(s).</h5> 
                            <?php 
                        }}*/
                    include('cas.php');
                 }
                //Fin | cas 5 : Toutes les cases sont remplies sauf le département
				
				
				//Début | cas 6 : Toutes les cases sont vides
				
                  if ( $depat == $ville  && $diplome == $ville && $de == "" && $a == ""){  
				  
                     $requete= 'select distinct POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC ';

                     /*$affiche= 'select count(POSTULANTE.IDPOS)

                    FROM postulante, departement, commune, qualification, diplome, specialite
                     
                    WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) ';
                     

                     if ($affichee= mysqli_query($db,$affiche)){ 
                                    
                        if($lostt= mysqli_fetch_array($affichee)){ 
                            ?>
                    
                            <h5 style='color:red;'><img style=' margin-left: 35%;width:25px; height:25px;' src='image/valider.png'> <?php echo ''.$lostt['count(POSTULANTE.IDPOS)'].'' ;  ?> femme(s) compétente(s) trouvée(s).</h5> 
                            <?php 
                        }}*/
                    include('cas.php');
                 }
                //Fin | cas 6 : Toutes les cases sont vides
				
				
			    //Début | cas 7 : Toutes les cases sont remplies sauf le diplome et l'age
				
				
                 if ( $depat != "" && $ville != ""  && $diplome = "NON DEFINI"  && $de == "" && $a == ""){  
				  
                     $requete= 'select POSTULANTE.IDPOS, POSTULANTE.NOMPOS, POSTULANTE.PRENPOS, DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y"), POSTULANTE.PREFIXE_MOBILE1, POSTULANTE.MOBILE1, POSTULANTE.MOBILE2, COMMUNE.COMMUNE, DIPLOME.INTITULEDIP, SPECIALITE.SPECIALITE, POSTULANTE.TYPCIN, POSTULANTE.CIN, LCASE(POSTULANTE.EMAIL), YEAR(current_timestamp) - YEAR(postulante.NE_LE) as AGE

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                     WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe))
					 
                     group by POSTULANTE.IDPOS
					 
					 ORDER BY postulante.NOMPOS ASC, postulante.PRENPOS ASC';

					

                     /*$affiche= 'select count(POSTULANTE.IDPOS)

                     FROM postulante, departement, commune, qualification, diplome, specialite
                     
                                          WHERE postulante.reside_a_dep=departement.IDDEP and postulante.reside_a_com = commune.IDCOM and commune.COMMUNE = "'.$ville.'" and ((postulante.qualification1 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)  or (postulante.qualification2 = qualification.IDQUAL and qualification.diplome = diplome.iddip and qualification.specialite = specialite.idspe)) ';
					 

					 
					 
                     if ($affichee= mysqli_query($db,$affiche)){ 
                                    
                        if($lostt= mysqli_fetch_array($affichee)){ 
                            ?>
                    
                            <h5 style='color:red;'><img style=' margin-left: 35%;width:25px; height:25px;' src='image/valider.png'> <?php echo ''.$lostt['count(POSTULANTE.IDPOS)'].'' ;  ?> femme(s) compétente(s) trouvée(s).</h5> 
                            <?php 
                        }}*/
                    include('cas.php');
                 }

				 
                //Fin | cas 7 : Toutes les cases sont remplies sauf le diplome et l'age	
				
				
				            
							//Affichage du nombre d'enregistrement(s)
							
                            ?>
                    
                            <h5 style='color:red;'><img style=' margin-left: 35%;width:25px; height:25px;' src='image/valider.png'> Femme(s) compétente(s) trouvée(s).</h5> 
                            <?php  

    
                 }
             }    
         ?>    
       
       
       </table>
        
        
       
        </form>
            
    
    
    </div>
    
        
    <footer>
		    <div>
           <img id="encr" src="image/piedpage.png"style="height : 122px; width : 848px;" >
               </div> 
			   
            
            <p id="bas"> © 2018 Copyright  BAANI RIFONGA WANEP - Tous droits réservés</p>
                     
        
        
        </footer>
    
</body>
</html>