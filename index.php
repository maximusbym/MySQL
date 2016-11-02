<?php


// start session
session_start();
// all configuration
include_once "config.php";
// connector for MySQL
include_once "database.php";
// Function helpers
include_once "repository.php";
// custom function
include_once "helpers.php";
// routing for site
include_once "routing.php";
// admin check
include_once "admin.check.php";
// business logic
include_once "controller.php";


