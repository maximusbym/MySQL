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
function showUserAccounts2($pdo,$userId){
    $sql = "SELECT a.guid, a.description, a.id, GROUP_CONCAT(u.name SEPARATOR ',') as subOwners,
 ua.user_id as ownerId
 FROM `users_accounts` as ua
 LEFT JOIN accounts as a 	
 ON ua.id=a.id 	AND ua.user_id = $userId 
 LEFT JOIN `users_accounts` as ua2	
 ON ua2.account_id = ua.id AND ua2.user_id <> $userId
 LEFT JOIN `users` as u
 	ON u.id = ua2.user_id
    GROUP BY a.guid, a.description, a.id, ua.user_id
HAVING a.guid IS NOT NULL";
    $accounts = $pdo->query($sql);
    $accountsArray = $accounts->fetchAll();
    return $accountsArray;
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
