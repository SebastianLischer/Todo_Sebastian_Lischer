<?php
include '../index.php';

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];
    $username = ($_SESSION['username']);
    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(title, username) VALUES(?, ?)");
        $res = $stmt->execute([$title, $username]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}