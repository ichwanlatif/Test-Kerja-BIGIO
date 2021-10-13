<?php 
    include('connectdb.php');
    
    $teacherID = $_SESSION['teacherID'];

    $sql = "SELECT * FROM courses WHERE teacherID = '$teacherID'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        $courseID = $row['courseID'];
        $courseName = $row['courseName'];
    }
?>

<div class="container border m-auto mt-5" style="max-width:500px">
    <h1 class="text-center mt-2">FORM NILAI</h1>
    <form class="inner-login" action="addNilai.php" method="post">
    <div class="form-group">
        <input hidden type="text" class="form-control" value="<?php echo $courseID ?>" name="courseID">
        <input hidden type="text" class="form-control" value="<?php echo $_GET['semesterID'] ?>" name="semesterID">
        <input hidden type="text" class="form-control" value="<?php echo $_GET['studentID'] ?>" name="studentID">
    </div>
    <div class="form-group">
        <label for="username">Mata Pelajaran</label>
        <input readonly type="text" class="form-control" value="<?php echo $courseName ?>" name="courseName">
    </div>
    <div class="form-group mt-3">
        <label for="password">Nilai</label>
        <input type="number" class="form-control" name="score">
    </div>
    <button value="submit" type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>