<?php
function createTransaction($pdo,$name, $accountId, $categoryId, $price){
    $date = date('Y-m-d H:i:s');
    $insert = $pdo->prepare("INSERT INTO `transactions`(`name`,`account_id`, `category_id`, `price`, `created_at`) 
                                    VALUES (?,?,?,?,?)");
    $insert->execute(array($name,$accountId,$categoryId,$price, $date));
}
function showTrunsaction($pdo,$userID){
    $sql = "SELECT ta.name, ac.description, ac.guid, ct.name as category, ta.`price`, ta.`created_at` 
            FROM `transactions` as ta 
            INNER JOIN accounts as ac 
            ON ta.`account_id` = ac.id 
            INNER JOIN categories as ct 
            ON ta.`category_id` = ct.id 
            INNER JOIN users_accounts as ua 
            ON ta.`account_id` = ua.account_id 
            WHERE ua.user_id = $userID 
            ORDER BY ta.`created_at` DESC";
    $transaction = $pdo->query($sql);
    $transactioArray = $transaction->fetchAll();
    return $transactioArray;
}