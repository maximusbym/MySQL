<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=testdb;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch (PDOException $e){
    echo $e->getMessage();
    exit;
}

// Simple function to handle PDO prepared statements
function sql($db, $q, $params = [], $return = null) {
    // Prepare statement
    $stmt = $db->prepare($q);
    // Execute statement
    $res = $stmt->execute($params);
    // Decide whether to return the rows themselves, or query status
    if ($return == "rows") {
        return $stmt->fetchAll();
    }
    else {
        return $res;
    }
}










//$sql = "SELECT * FROM login";
//$rs = $pdo->query($sql);
//
////while ($row =$rs->fetch(PDO::FETCH_ASSOC)){
////    print_r($row);
////    echo "<br>";
////}
//// or
////$resuslt = $pdo->query("SELECT * FROM login", PDO::FETCH_ASSOC);
////var_dump($resuslt)
//$rows = $rs->fetchAll(PDO::FETCH_OBJ);
//var_dump($rows);