
       <?php                      /*On calcul combien de donnée il y  a dans la base*/
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');                    

         if ($requetee = mysqli_query($db,$requete)){ 
                                    
              while ($lost = mysqli_fetch_array($requetee)){ 
                                                
                                                
                           ?>
                        
							<em> <?php echo $row ;  ?></em>

						   <tr>
                           <td style="width:300px; text-align:center;"><label><?php echo ' '.$lost['TYPCIN'].' '.$lost['CIN'].'' ; ?></td>
                            <td style="width:300px; text-align:center;"><label><?php echo ' '.$lost['NOMPOS'].' '.$lost['PRENPOS'].'' ; ?></label></td>
                            <td style="width:200px; text-align:center;"><label><?php echo ' '.$lost['DATE_FORMAT(POSTULANTE.NE_LE, "%d/%m/%Y")'].' ' ; ?></label></td>
                            <?php if( $lost['MOBILE2'] != " " && $lost['MOBILE1'] != " ") { ?>
                            <td style="width:200px; text-align:center;"><label><?php echo ''.$lost['MOBILE1'].' / '.$lost['MOBILE2'].'  ' ; ?></label></td>
                            <?php }else { ?><td style="width:200px; text-align:center;"><label><?php echo ''.$lost['MOBILE1'].' '.$lost['MOBILE2'].'  ' ; ?></label></td><?php }?>
                            <td style="width:200px; text-align:center;"><label><?php echo ' '.$lost['LCASE(POSTULANTE.EMAIL)'].' ' ; ?></label></td>
                            <td style="width:300px; text-align:center;"><label><?php echo ' '.$lost['COMMUNE'].' ' ; ?></label></td>
                            <td style="width:100px; text-align:center;"><label><?php echo ' '.$lost['INTITULEDIP'].'  ' ; ?></label></td>
                            <td style="width:100px; text-align:center;"><label><?php echo ' '.$lost['SPECIALITE'].' ' ; ?></label></td>
                            <td style="width:50px; text-align:center;"><label><?php echo ' '.$lost['AGE'].' ' ; ?></label></td>
                        
                            </tr>
                        
                        
                          <?php    
                                            
                      }
                      }
                                    
                                   