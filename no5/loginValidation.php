<?php

    include("connectdb.php");
    session_start();

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM accounts where accountUsername = '$username' and accountPassword = '$password'";
    $login = $conn->query($sql);

    if($login->num_rows > 0){
        while($row = $login->fetch_assoc()){
            $role = $row['accountRole'];
            $id = $row['accountID'];
        }
        if($role != 1){
            switch($role){
                case "2":{
                    $sql = "SELECT * FROM teachers where accountID = '$id'";
                    $user = $conn->query($sql);
                    while($row = $user->fetch_assoc()){
                        $teacherID = $row['teacherID'];
                    }
                    $_SESSION["teacherID"] = $teacherID;
                    break;
                }
                case "3":{
                    $sql = "SELECT * FROM students where accountID = '$id'";
                    $user = $conn->query($sql);
                    while($row = $user->fetch_assoc()){
                        $studentID = $row['studentID'];
                    }
                    $_SESSION["studentID"] = $studentID;
                    break;
                }
            }

            $_SESSION["userID"] = $userID;
        }
        $_SESSION["role"] = $role;
        header("location:template.php");
    }
    else{
        header("location:formLogin.php?login_error");
    }


?>