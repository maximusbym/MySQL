<?php
//unset($_SESSION['cart']);
//var_dump($_SESSION['cart']);
if ($action =='catalog' && $idRout){
    $product = getProductsByCategory($pdo ,$idRout);
    view('category',$product);
}
else if( $action == 'catalog' ) {

    $category =  getCategories($pdo);
    view('catalog', $category);

}

