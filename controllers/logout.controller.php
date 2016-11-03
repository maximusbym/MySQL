<?php
if ($action == 'logout'){
    unset( $_SESSION['id']);
    unset($_SESSION['role']);
    header('location: /login');
}