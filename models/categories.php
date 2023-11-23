<?php 

    function loadall_categories(){
        $sql = "select * from categories";
        $list_categories = pdo_query($sql);
        return $list_categories;
    }

    function insert_categories($category_name, $category_image, $suggest)
{
    $sql = "INSERT INTO categories (category_name,category_image,suggest) VALUES ('$category_name','$category_image','$suggest')";
    pdo_execute($sql);
}
function update_categories($category_name, $category_image, $suggest, $category_id)
{
    $sql = "UPDATE categories SET category_name = '$category_name',category_image='$category_image',suggest='$suggest' WHERE category_id = $category_id";
    pdo_execute($sql);
}

function categories_delete($category_id)
{
    $sql = "DELETE FROM categories WHERE category_id".$category_id;
    pdo_execute($sql);
}
function categories_select_all()
{
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}

function categories_select_by_id($category_id)
{

    $sql = "SELECT * FROM categories WHERE category_id=$category_id";
    return pdo_query_one($sql);
}

function categories_exist($category_id)
{
    $sql = "SELECT count(*) FROM categories WHERE category_id=$category_id";
    return pdo_query_value($sql) > 0;
}
function categories_name_exist($category_name)
{
    $sql = "SELECT count(*) FROM categories WHERE category_name='$category_name'";
    return pdo_query_value($sql) > 0;
}

function categories_name_exist_id($category_name, $category_id)
{
    $sql = "SELECT count(*) FROM categories WHERE category_name='$category_name' AND category_id != $category_id";
    return pdo_query_value($sql) > 0;
}

?>