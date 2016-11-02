<?php
die();
ini_set('display_errors',1);
error_reporting(E_ALL);

//include  "database.php";
function RandName(){
    $randUserName = ['Max','Vitaliy', 'Dmitriy', 'Andriy', 'Katya',
        'Ne Katya', 'Yanukovich', 'Putin', 'Ne Putin', 'Misha','User','fake','Ross','superman','random',
        'pig','pen','apple'];
    return $randUserName[rand(0,17)];
}
function RandTitle($i){
    $randTitle = ['Apple', 'Samsung','LG','Lenovo','HTC','Xiaomi','Onomi', 'Nokia', 'Kirpich', 'Lopata'];
//    return $randTitle[rand(0,9)];
    return $randTitle[$i];
}
function RandTitle2(){
    $randTitle = ['Apple', 'Samsung','LG','Lenovo','HTC','Xiaomi','Onomi', 'Nokia', 'Kirpich', 'Lopata'];
   return $randTitle[rand(0,9)];
//    return $randTitle[$i];
}
function RandPrice(){
    return $randPrice = rand(100, 1000);
}
function RandID(){
    return $random = rand(1, 20);
}
//function RandGeonameID(){
//    return $random = rand(1, );
//}
function RandRole(){
    $random = rand(1,10);
    if ($random >= 10) {
        return 'admin';
    }
    else return 'customer';
}
function RandEmail(){
    $randEmail = ['m@g.com', 'lasd@ras.ua', 'mail@i.ua', 'lol@mail.ru', 'hacker@noob.com', 'readre@gmail.com'];
    return $randEmail[rand(0,5)];
}
function RandPass(){
    return $randPass = rand(100000000,999999999999);
}
function RandDateTime(){
    $year = rand(1900,2015);
    $month = rand(1,12);
    $day = rand(1,28);
    $hour = rand(0,23);
    $minute = rand(0,59);
    $second = rand(0,59);
    return $randData = "$year-$month-$day $hour:$minute:$second";
}
function RandStatus(){
    switch (rand(0,2)){
        case 0: return 'open';
        case 1: return 'in progress';
        case 2: return 'closed';
    }
}
function RandLogin(){
    $lengh = rand(3, 10);
    $chars = 'abdefhiknrstyz';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $lengh; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
function Randtext(){
    $lengh = rand(120, 350);
    $chars = 'abdefhiknrstyz ABDEFGHKNQRSTYZ 23456789 ';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $lengh; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
function RandRating(){
    return $rand = rand(0, 200);
}
function get($pdo){
    $products = $pdo->query('SELECT `geonameid` FROM `geoname` GROUP BY `geonameid` 
                            ORDER BY `geoname`.`geonameid` ASC');
    $productsArray = $products->fetchAll();
    return $productsArray;
}
$art = get($pdo);
//var_dump($art);
$count =count($art);
$count = $count -1 ;
//echo $count."<br>";
//$rand2 = rand(0,$count);
//echo $rand2;
//var_dump($art[$rand2]['geonameid']);

//var_dump($art);


$insertUsers = $pdo->prepare("INSERT INTO users(`name`,`role`,`email`,`login`, `password`, `last_activity`, `geonameid`) 
VALUES(:name, :role, :email, :login, :password, :last_activity,:geonameid)");


for ($i =0;$i<$count;$i++){
    $insertUsers->execute(array('name' => RandName(),'role' => RandRole(), 'email' => RandEmail(), 'login' => RandLogin(),
        'password' => RandPass(), 'last_activity' => RandDateTime(), 'geonameid' => $art[$i]['geonameid']));
//    var_dump(array('title' => RandTitle2(), 'description' => Randtext(), 'price' => RandPrice(),
//        'category_id' => RandID()));
}
//echo "<h1>ВОВА ОБНОВИ</h1>>";
die();

// $insert = $pdo->prepare("INSERT INTO products(`description`,`price`, `categoty_id`) VALUES(?)");
$insertCategories = $pdo->prepare("INSERT INTO categories(`title`) VALUES (?)" );

$insertUsers = $pdo->prepare("INSERT INTO users(`name`,`role`,`email`,`login`, `password`, `last_activity`)
VALUES(:name, :role, :email, :login, :password, :last_activity)");

$insertProducts = $pdo->prepare("INSERT INTO products(`title`, `description`, `price`, `category_id`)
 VALUES(:title, :description, :price, :category_id)");

$insertOrders = $pdo->prepare("INSERT INTO orders(`user_id`, `product_id`,`created_at`, `delivered_at`, `status`, `total_price`)
 VALUES(:user_id, :product_id,:created_at, :delivered_at, :status, :total_price)");
$insertReviews = $pdo->prepare("INSERT INTO reviews(`user_id`, `product_id`,`created_at`, `text`, `rating`)
 VALUES(:user_id, :product_id,:created_at, :text, :rating)");
// user_id INT, product_id INT, created_at DATETIME, text text(5000), rating smallint

$iterator = 0;
for ($i = 0; $i < 50000;$i++){


    $insertUsers->execute(array('name' => RandName(),'role' => RandRole(), 'email' => RandEmail(), 'login' => RandLogin(),
        'password' => RandPass(), 'last_activity' => RandDateTime()));

    $iterator++;
}
echo $iterator;
die();


for ($i = 0; $i < 10;$i++){
    $insertCategories->execute(array(RandTitle($i)));
    $idLastCategory = $pdo->lastInsertId();

    $insertProducts->execute(array('title' => RandTitle2(), 'description' => Randtext(), 'price' => RandPrice(),
        'category_id' => $idLastCategory));
    $idLastProducts = $pdo->lastInsertId();

    $insertUsers->execute(array('name' => RandName(),'role' => RandRole(), 'email' => RandEmail(), 'login' => RandLogin(),
        'password' => RandPass(), 'last_activity' => RandDateTime()));
    $idLastUsers = $pdo->lastInsertId();
    $select = $pdo->query('SELECT price from products WHERE id ='. $idLastProducts);
    $res = $select->fetchAll();

    $insertOrders->execute(array('user_id' => $idLastUsers, 'product_id' => $idLastProducts, 'created_at' => RandDateTime(),
      'delivered_at' => null, 'status' => RandStatus(), 'total_price' => $res[0]['price'] ));
    $insertReviews->execute(array('user_id' => $idLastUsers, 'product_id' => $idLastProducts, 'created_at' => RandDateTime(),
        'text' => Randtext(), 'rating' => RandRating()));
}

/**
 * CREATE TABLE orders  user_id, product_id, created_at DATETIME, delivered_at DATETIME default null, status enum('open','in progress','closed'), total_price int);
 */