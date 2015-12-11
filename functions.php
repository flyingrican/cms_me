<?php
   function confirm($result){
    
    if(!$result){
        
            global $connection;
            
            die("Query Failed" . mysqli_error($connection));
            
        }
    
}
?>
