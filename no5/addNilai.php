<?php 
    include("connectdb.php");

    $score = $_POST['score'];
    $semesterID = $_POST['semesterID'];
    $courseID = $_POST['courseID'];

    $sql = "UPDATE semester_course SET score ='$score' WHERE semesterID = '$semesterID' AND courseID = '$courseID'";
    $update = $conn->query($sql);

    if($update){
        header("location:template.php?content=listStudent.php");
    }
    

    
?>