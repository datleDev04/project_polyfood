<?php
   function roles_select_all(){
        $sql = "SELECT * FROM roles";
        return pdo_query($sql);
    }
    
?>