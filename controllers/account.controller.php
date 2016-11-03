<?php
if ($action == 'account'){
    $createTransaction = isset($_POST['transaction'])? $_POST['transaction'] : null;
    $createAccount = isset($_POST['new_account'])? $_POST['new_account'] : null;
    $createCategory = isset($_POST['new_category'])? $_POST['new_category'] : null;
    $sortByAcc = isset($_GET['sort'])? $_GET['sort'] : null;
    if (!isset($_SESSION['id'])){
        header('location: /login');
        die();
    }
    $userId = $_SESSION['id'];
    if ($createAccount){
        $guid = uniqid();
        createAccount($pdo,$guid,$createAccount,$userId);
    }
    if ($createCategory ){
        createCategory($pdo,$createCategory);
    }
    if ($createTransaction){
        $ct = $createTransaction;
        createTransaction($pdo, $ct['name'],$ct['account'],$ct['category'],$ct['amount']);
    }
    if ($sortByAcc){
        $transaction = showTaByAccount($pdo,$userId );
        $data['transaction'] = $transaction;
    } else {
        $data['transaction'] = showTrunsaction($pdo,$userId);
    }
    $sum = getTaSum($pdo,$userId);
    $sum = number_format($sum['sum'], 2, ',', ' ');
    $data['sum'] = $sum;
//    $a = showUserAccounts2($pdo,$userId);
//    var_dump($a);
    $data['account'] = showUserAccounts2($pdo,$userId);
    $data['categories'] =  getCategories($pdo);
//    $data['transaction'] = showTrunsaction($pdo,$userId);

    view('account',$data);
}