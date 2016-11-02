<?php
if ($action == null){
    //header();
    include "templates/404.view.php";
}
//if ($action == 'login'){
//    view('login');
//}
include_once "controllers/login.controller.php";
include_once "controllers/account.controller.php";



