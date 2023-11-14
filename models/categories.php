<?php 
function loadall_category()
{
    $sql = "select * from categories";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_category($category_id)
{
    $sql = "select * from categories where category_id=" . $category_id;
    $cate = pdo_query_one($sql);
    return $cate;
}
