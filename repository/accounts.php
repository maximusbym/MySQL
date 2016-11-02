<?php
function createAccount($pdo,$guid,$description,$userId){
    $sql = "INSERT INTO `accounts`(`guid`, `description`) VALUES ('{$guid}','{$description}')";
    $insert = $pdo->prepare($sql);
    $insert->execute();
    $accountId = $pdo->lastInsertId();
    $sql2 = "INSERT INTO `users_accounts`(`user_id`, `account_id`) 
            VALUES ('{$userId}','{$accountId}')";
    $insert2 = $pdo->prepare($sql2);
    $insert2->execute();
}
function showUserAccounts($pdo,$userId){
    $sql = "SELECT a.guid, a.description, a.id
            FROM `users_accounts` as ua
            INNER JOIN accounts as a 
            ON ua.id=a.id
            where ua.user_id = $userId";
    $accounts = $pdo->query($sql);
    $accountsArray = $accounts->fetchAll();
    return $accountsArray;
}
