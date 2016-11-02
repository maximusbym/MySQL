<?php
if ($action == 'myadmin') {
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
    if ((bool)$role) {
        if ( $role == 'admin' ){
            view('admin');
        }
        else{
            echo "get out of here";
            header('location: /login');
        }
    }
}