<?php
function findGeoName($pdo, $pattern){
    $name = $pdo->query("SELECT `geonameid`,`name` FROM `geoname` WHERE `name` LIKE '{$pattern}%' LIMIT 10");
    $nameArray = $name->fetchAll();
    return $nameArray;
}