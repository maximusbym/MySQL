<?php
if ($action == 'getMessages'){
    $messages = read(MESSAGE_PATH);
    if (!empty($newMessages)) {
        $messages = textChange($newMessages);
    }
    header('Content-Type: application/json');

    echo json_encode( ['data' => $messages] );
}