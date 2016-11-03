<?php
if ($action == 'login'){
    $loginForm = isset($_POST['login']) ? $_POST['login'] : null;
    $passwordForm = isset($_POST['password']) ? $_POST['password'] : null;
    $rememberMe = isset($_POST['rememberMe']) ? $_POST['rememberMe'] : null;
    $autrizationOk = authorizationUser($pdo,$loginForm,$passwordForm);

    if ($autrizationOk)  {
            if ($rememberMe){
                setcookie('password', md5($passwordForm), time()+9999999 );
            }
        $_SESSION['id'] = $autrizationOk[0]['id'];
        header('location: /account');

    }
    var_dump($_COOKIE);
    view('login');
}