<?php 
    include("connectdb.php");

    $sql = "INSERT INTO accounts VALUES (null, '".$_POST['username']."', '".md5($_POST['password'])."', '".$_POST['role']."');";
    $account = $conn->query($sql);

    if($account){
        if($_POST['role'] == 2){
            $sql = "INSERT INTO teachers VALUES (null, '".$conn->insert_id."', '".$_POST['nama']."', '".$_POST['nomor_induk']."');";
            if($conn->query($sql)){
                header("location:template.php?content=home.php");
            }
        }
        else if($_POST['role'] == 3){
            $sql = "INSERT INTO students VALUES (null, '".$conn->insert_id."', '".$_POST['nama']."', '".$_POST['nomor_induk']."');";
            if($conn->query($sql)){
                header("location:template.php?content=home.php");
            }
        }
    }
    

    
?>