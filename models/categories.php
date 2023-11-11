<?php 

    function loadall_categories(){
        $sql = "select * from categories";
        $list_categories = pdo_query($sql);
        return $list_categories;
    }
?>