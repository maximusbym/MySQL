<?php
function getProductsByCategory($pdo, $id){
    $products = $pdo->query('SELECT * FROM `products` WHERE `category_id` ='.$id);
    $productsArray = $products->fetchAll();
    return $productsArray;
}
function getProductById($pdo, $id){
    $product = $pdo->query('SELECT * FROM `products` WHERE `id` ='.$id);
    $productArray = $product->fetch();
    return $productArray;
}
//
function getProductsByIds($pdo, $idArr){
    $arr = implode(",", $idArr);
    $product = $pdo->query("SELECT * FROM `products` WHERE `id` IN ($arr)");
    $productArray = $product->fetchAll();
    return $productArray;
}
function createProduct($pdo,$name,$description,$price,$category_id ){
    $sql = "INSERT INTO `products`(`title`,`description`,`price`,`category_id`) VALUES (?,?,?,?)";
    $insert = $pdo->prepare($sql);
    $insert->execute(array($name,$description,$price,$category_id));
}
function updateProduct($pdo,$id,$title,$description,$price){
    $sql = "UPDATE `products` 
                  SET `title` = '{$title}', `description` = '{$description}', `price` = '{$price}'
                  WHERE `id`='{$id}'";
    $insert = $pdo->prepare($sql);
    $insert->execute();
//    $sql = "UPDATE `products`
//            SET(`title`,`description`,`price`)
//            VALUES(?,?,?) WHERE `id` ='{$id}'";
//    $category = $pdo->prepare($sql);
//    $category->execute(array($title,$description,$price));
}
function deleteProductById($pdo, $id){
    $sql = "DELETE FROM `products` WHERE `id`=".$id;
    $count = $pdo->exec($sql);
    return $count;
}