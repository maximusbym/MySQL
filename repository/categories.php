<?php
function createCategory($pdo, $name){
        $sql = "INSERT INTO `categories`(`name`) VALUES ('{$name}')";
        $insert = $pdo->prepare($sql);
        $insert->execute();
}


////
function getCategories($pdo){
    $categories = $pdo->query('SELECT * FROM `categories`');
    $categoriesArray = $categories->fetchAll();
    return $categoriesArray;
}
function getCategoryById($pdo, $id){
    $categories = $pdo->query('SELECT * FROM `categories` WHERE `id`='.$id);
    $category = $categories->fetch();
    return $category;
}
function updateCategoryBuId($pdo,$id,$title){
    $sql = "UPDATE `categories` SET `title` = '{$title}' WHERE id='{$id}'";
    $category = $pdo->prepare($sql);
    $category->execute();
}
function deleteCategoryById($pdo, $id){
    $sql = "DELETE FROM `categories` WHERE `id`=".$id;
    $count = $pdo->exec($sql);
    return $count;
}