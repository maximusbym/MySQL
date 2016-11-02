<?php
if ($action == 'account'){
    $createTransaction = isset($_POST['transaction'])? $_POST['transaction'] : null;
    $createAccount = isset($_POST['new_account'])? $_POST['new_account'] : null;
    $createCategory = isset($_POST['new_category'])? $_POST['new_category'] : null;

    if (!isset($_SESSION['id'])){
        header('location: /login');
        die();
    }
    $userId = $_SESSION['id'];
    if ($createAccount){
        $guid = uniqid();
        createAccount($pdo,$guid,$createAccount,$userId);
        echo "create <hr>";
    }
    if ($createCategory ){
        createCategory($pdo,$createCategory);
    }
    if ($createTransaction){
        $ct = $createTransaction;
        createTransaction($pdo, $ct['name'],$ct['account'],$ct['category'],$ct['amount']);
    }
    $data['account'] = showUserAccounts($pdo,$userId);
    $data['categories'] =  getCategories($pdo);
    $data['transaction'] = showTrunsaction($pdo,$userId);

    view('account',$data);
}