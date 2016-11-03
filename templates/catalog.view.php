<?php
echo "<div class='container'>";
foreach ($data as $value){
    $url = '/catalog/'.$value['id'];
    echo  "<a href='$url' >".$value['title']."</a><br>";

}
echo "</div>";