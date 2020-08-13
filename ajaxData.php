<?php
//Include database configuration file
include('dbConfig.php');

if(isset($_POST["IDPAYS"]) && !empty($_POST["IDPAYS"])){
    //Get all state data
    $query = $db->query("SELECT * FROM DEPARTEMENT WHERE IDPAYS = ".$_POST['IDPAYS']." AND status = 1 ORDER BY DEPARTEMENT ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value=" ">Département</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['IDDEP'].'">'.$row['DEPARTEMENT'].'</option>';
        }
    }else{
        echo '<option value="">Non valide</option>';
    }
}

if(isset($_POST["IDDEP"]) && !empty($_POST["IDDEP"])){
    //Get all city data
    $query = $db->query("SELECT * FROM COMMUNE WHERE IDDEP = ".$_POST['IDDEP']." AND status = 1 ORDER BY COMMUNE ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value=" "></option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['COMMUNE'].'">'.$row['COMMUNE'].'</option>';
        }
    }else{
        echo '<option value="">Non valide</option>';
    }
}
?>



















