<div class="container">
<?php

echo "<h1></h1>";
foreach ($data as $value){
    $url = '/product/'.$value['id'];
    echo  "<a href='$url' >".$value['title']."</a><br>";
    echo "Product name: ".$value['title']."<br>";
    echo "Price: ".$value['price']."<hr>";
//  var_dump($value);
}
echo "</div>";