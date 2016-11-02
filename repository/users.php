<?php
function saveUser($pdo, $name, $email, $password, $login){
    $insert = $pdo->prepare("INSERT INTO users(`name`,`role`,`email`,`password`,`login`) VALUES (?,?,?,?,?)");
    $insert->execute(array($name,'customer',$email, $password, $login));
}
function checkUniqueUser($pdo,$email,$login){
    $user = $pdo->query("SELECT * FROM `users` WHERE `login` ='{$login}' OR `email` = '{$email}'");
    $userCheck = $user->fetchAll();
    return $userCheck;
}
function authorizationUser($pdo,$param,$password){
    $user = $pdo->query("SELECT * 
                          FROM `users` 
                          WHERE `email` ='{$param}' AND `password` = '{$password}'");
    $userCheck = $user->fetchAll();
    return $userCheck;
}
function getUserInfo($pdo, $id){
    $user = $pdo->query("SELECT * 
                          FROM `users` 
                          WHERE `id` ='{$id}' ");
    $userGet = $user->fetch();
    return $userGet;
}
function getAllUsers($pdo){
    $users = $pdo->query("SELECT *  FROM `users` LIMIT 100");
    $usersGet = $users->fetchAll();
    return $usersGet;
}
function createUser($pdo, $paramArray){
//save user func
}
function updateUser($pdo, $paramArray){

}
function deleteUser($pdo, $param){
    $sql = "DELETE FROM `users` WHERE `id`=".$param;
    $count = $pdo->exec($sql);
    return $count;
}