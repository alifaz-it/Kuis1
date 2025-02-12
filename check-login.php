<?php
session_start();
require 'config.php';

if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
     $sql_check = "SELECT username, 
                         hak_akses, 
                         user_id
                  FROM user
                  WHERE 
                       username=? 
                       AND 
                       password=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($nama, $level_user, $id_user);

        while ( $check_log->fetch() ) {
            $_SESSION['hak_akses'] = $level_user;
            $_SESSION['user_id']   = $id_user;
            $_SESSION['username']  = $nama;          
        }

        $check_log->close();

        header('location:on-'.$level_user);
        exit();

    } else {
        header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();
    }

   
} else {
    header('location:login.php');
    exit();
}